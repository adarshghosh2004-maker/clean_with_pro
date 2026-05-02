var baseUrl = jQuery("#base_url").val();

/************ Chunk Full Novel  ************/
var datafile = new plupload.Uploader({
    runtimes: "html5,flash,silverlight,html4",
    browse_button: "uploadFile", // you can pass in id...
    container: document.getElementById("container"), // ... or DOM Element itself
    chunk_size: "1mb",
    url: baseUrl + "/admin/video/savechunk",
    max_file_count: 1,
    unique_names: true,
    send_file_name: true,
    multi_selection: false,
    filters: {
        mime_types: [{ title: "Content files", extensions: "mp4" }],
        prevent_duplicates: true,
    },
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    init: {
        PostInit: function () {
            document.getElementById("filelist").innerHTML = "";
            document.getElementById("upload").onclick = function () {
                datafile.start();
                return false;
            };
        },
        FilesAdded: function (up, files) {
            let oldFile = document.getElementById("oldFileList");

            if (oldFile) {
                oldFile.style.display = "none";
            }

            while (up.files.length > 1) {
                up.removeFile(up.files[0]);
                document.getElementById("filelist").innerHTML = "";
            }
            plupload.each(files, function (file) {
                document.getElementById("filelist").innerHTML +=
                    '<div id="' +
                    file.id +
                    '">' +
                    file.name +
                    " (" +
                    plupload.formatSize(file.size) +
                    ") <b></b></div>";
            });
        },
        UploadProgress: function (up, file) {
            jQuery("#dvloader").show();
            document
                .getElementById(file.id)
                .getElementsByTagName("b")[0].innerHTML =
                "<span>" + file.percent + "%</span>";
        },
        FileUploaded: function (up, file, info) {
            jQuery("#dvloader").hide();

            var response = JSON.parse(info.response);
            if (response.result) {
                jQuery("#mp3_file_name").val(response.result);
            } else if (file.target_name) {
                jQuery("#mp3_file_name").val(file.target_name);
            }
            toastr.success("File Uploaded");
        },
        Error: function (up, err) {
            document.getElementById("console").innerHTML +=
                "\nError #" + err.code + ": " + err.message;
        },
    },
});
datafile.init();
/***********************************************/
