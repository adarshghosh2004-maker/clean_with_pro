<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author_Request;
use App\Models\Bookmark;
use App\Models\Common;
use App\Models\Content_View;
use App\Models\Notification;
use App\Models\Read_Notification;
use App\Models\Refer_Earn;
use App\Models\Review;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;

// Login Type : 1= OTP, 2= Goggle, 3= Apple, 4= Normal
class UserController extends Controller
{
    private $folder = "user";
    public $common;

    public function __construct()
    {
        $this->common = new Common;
    }

    public function index(Request $request)
    {
        try {
            $params['data'] = [];

            if ($request->ajax()) {

                $input_search = $request['input_search'];
                $input_type = $request['input_type'];

                $query = User::with('service');

                if (!empty($input_search)) {
                    $query->where(function ($q) use ($input_search) {
                        $q->where('name', 'LIKE', "%{$input_search}%")
                            ->orWhere('email', 'LIKE', "%{$input_search}%")
                            ->orWhere('phone', 'LIKE', "%{$input_search}%")
                            ->orWhere('suburb', 'LIKE', "%{$input_search}%");
                    });
                }

                if ($input_type == "today") {
                    $query->whereDay('created_at', date('d'))
                        ->whereMonth('created_at', date('m'))
                        ->whereYear('created_at', date('Y'));
                } elseif ($input_type == "month") {
                    $query->whereMonth('created_at', date('m'))
                        ->whereYear('created_at', date('Y'));
                } elseif ($input_type == "year") {
                    $query->whereYear('created_at', date('Y'));
                }

                $data = $query->latest()->get();

                return DataTables()::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {

                        $user_delete = __('label.delete_user');

                        $delete = '<form onsubmit="return confirm(\'' . $user_delete . '\');" method="POST" action="' . route('admin.user.destroy', [$row->id]) . '">
                            <input type="hidden" name="_token" value="' . csrf_token() . '">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="edit-delete-btn" title="' . __('label.delete') . '">
                                <i class="fa-solid fa-trash-can fa-xl"></i>
                            </button>
                        </form>';

                        $btn = '<div class="d-flex justify-content-center align-items-center gap-2">';

                        // 👁 View details page
                        $btn .= '<a href="' . route('admin.user.details', [$row->id]) . '" class="edit-delete-btn mr-2" title="' . __('label.view_details') . '">';
                        $btn .= '<i class="fa-solid fa-eye fa-xl"></i>';
                        $btn .= '</a>';

                        // 🧾 Invoice — opens modal, passes user id
                        $btn .= '<button type="button"
                                    class="edit-delete-btn mr-2 btn-open-invoice"
                                    title="View & Download Invoice"
                                    data-id="' . $row->id . '">
                                    <i class="fa-solid fa-download fa-xl"></i>
                                </button>';

                        // 🗑 Delete
                        $btn .= $delete;
                        $btn .= '</div>';

                        return $btn;
                    })
                    ->addColumn('status', function ($row) {
                        if ($row->status == 1) {
                            $class = 'show-btn';
                            $label = __('label.confiremed');
                        } elseif ($row->status == 2) {
                            $class = 'primary-btn';
                            $label = __('label.completed');
                        } else {
                            $class = 'upcoming-btn';
                            $label = __('label.pending');
                        }
                        return '<button class="' . $class . '">' . $label . '</button>';
                    })
                    ->addColumn('date', function ($row) {
                        return date("d M Y", strtotime($row->created_at));
                    })
                    ->addColumn('books_bought', function ($row) {
                        return $row->content_transaction_count ?? 0;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
            }

            return view('admin.user.index', $params);

        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }

    public function create()
    {
        try {
            $params['data'] = [];
            $params['services'] = Service::where('status', 1)->get();

            return view('admin.user.add', $params);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:2',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'suburb' => 'required',
                'date' => 'required',
                'time' => 'required',
                'service_id' => 'required',
                'msg' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 400, 'errors' => $validator->errors()->all()]);
            }

            $requestData = $request->all();
            $requestData['date'] = isset($request['date']) ? date('Y-m-d', strtotime($request['date'])) : "";

            $data = User::updateOrCreate(['id' => $requestData['id']], $requestData);

            if (isset($data->id)) {
                return response()->json(['status' => 200, 'success' => __('label.success_add_user')]);
            } else {
                return response()->json(['status' => 400, 'errors' => __('label.error_add_user')]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $params['data'] = User::where('id', $id)->first();
            $params['services'] = Service::where('status', 1)->get();

            if ($params['data'] != null) {
                $temp = array($params['data']);
                $temp = $this->common->imageNameToUrl($temp, 'image', $this->folder);
                $params['data'] = $temp[0];

                return view('admin.user.edit', $params);
            } else {
                return redirect()->back()->with('error', __('label.data_not_found'));
            }
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:2',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'suburb' => 'required',
                'date' => 'required',
                'service_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 400, 'errors' => $validator->errors()->all()]);
            }

            $requestData = $request->all();
            $requestData['date'] = isset($request['date']) ? date('Y-m-d', strtotime($request['date'])) : "";
            $requestData['time'] = $requestData['time'] ?? "";
            $requestData['msg'] = $requestData['msg'] ?? "";
            $requestData['amount'] = $requestData['amount'] ?? 0;
            $requestData['reply'] = $requestData['reply'] ?? "";

            $data = User::updateOrCreate(['id' => $requestData['id']], $requestData);

            if (isset($data->id)) {
                return response()->json(['status' => 200, 'success' => __('label.success_edit_user')]);
            } else {
                return response()->json(['status' => 400, 'errors' => __('label.error_edit_user')]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $data = User::where('id', $id)->first();
            if (isset($data)) {
                Notification::where('user_id', $id)->delete();
                $this->common->deleteImageToFolder($this->folder, $data['image']);
                $data->delete();
            }
            return redirect()->route('admin.user.index')->with('success', __('label.user_delete'));
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $data = User::where('id', $id)->first();
            if (isset($data)) {
                $data->status = $data->status === 1 ? 0 : 1;
                $data->save();
                return response()->json(['status' => 200, 'success' => __('label.status_changed'), 'status_code' => $data->status]);
            } else {
                return response()->json(['status' => 400, 'errors' => __('label.data_not_found')]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }

    public function details($id, Request $request)
    {
        try {
            $params['quote'] = User::where('id', $id)->with('service')->first();
            $params['services'] = Service::where('status', 1)->get();

            if ($params['quote'] != null) {
                return view('admin.user.detail', $params);
            } else {
                return redirect()->back()->with('error', __('label.data_not_found'));
            }
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }

    /**
     * STEP 1 — Return full user/quote data as JSON for the invoice modal.
     */
    public function getInvoiceData($id)
    {
        try {
            $quote = User::where('id', $id)->with('service')->firstOrFail();

            $statusLabels = [
                0 => 'Pending',
                1 => 'Confirmed',
                2 => 'Completed',
            ];

            $statusClasses = [
                0 => 'badge-pending',
                1 => 'badge-confirmed',
                2 => 'badge-completed',
            ];

            return response()->json([
                'status' => 200,
                'invoice_number' => 'INV-' . str_pad($quote->id, 6, '0', STR_PAD_LEFT),
                'invoice_date' => now()->format('d M Y'),
                'due_date' => now()->addDays(30)->format('d M Y'),
                'name' => $quote->name,
                'email' => $quote->email,
                'phone' => $quote->phone ?? '-',
                'suburb' => $quote->suburb ?? '-',
                'service' => $quote->service->title ?? '-',
                'date' => $quote->date ? \Carbon\Carbon::parse($quote->date)->format('d M Y') : '-',
                'time' => $quote->time ?? '-',
                'amount' => $quote->amount ? number_format($quote->amount, 2) : null,
                'msg' => $quote->msg ?? null,
                'reply' => $quote->reply ?? null,
                'status_label' => $statusLabels[$quote->status] ?? 'Unknown',
                'status_class' => $statusClasses[$quote->status] ?? 'badge-pending',
                'download_url' => route('admin.user.invoice.download', $quote->id),
            ]);

        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }

    /**
     * STEP 2 — Generate and download the PDF invoice.
     * Triggered by the Download button inside the modal.
     */
    public function downloadInvoice($id)
    {
        try {
            $quote = User::where('id', $id)->with('service')->firstOrFail();

            $statusLabels = [
                0 => 'Pending',
                1 => 'Confirmed',
                2 => 'Completed',
            ];

            $data = [
                'invoice_number' => 'INV-' . str_pad($quote->id, 6, '0', STR_PAD_LEFT),
                'invoice_date' => now()->format('d M Y'),
                'due_date' => now()->addDays(30)->format('d M Y'),
                'quote' => $quote,
                'status_label' => $statusLabels[$quote->status] ?? 'Unknown',
            ];

            $pdf = Pdf::loadView('admin.user.invoice', $data)->setPaper('a4', 'portrait');
            $filename = 'Invoice-' . $data['invoice_number'] . '.pdf';

            return $pdf->download($filename);

        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
