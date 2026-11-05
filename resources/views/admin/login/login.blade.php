<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ __('label.login') }} | {{ App_Name() }}</title>
<link rel="shortcut icon" href="{{ Tab_Icon() }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="{{ asset('assets/css/admin/style.css') }}?v={{ time() }}" rel="stylesheet">
</head>
<body class="admin-login">
@php
    $appSetting = Setting_Data();
    $contactNo  = trim($appSetting['contact'] ?? '');
    $websiteUrl = trim($appSetting['website'] ?? '');
    $websiteTxt = rtrim(preg_replace('#^https?://#i', '', $websiteUrl), '/');
    if ($websiteUrl !== '' && !preg_match('#^https?://#i', $websiteUrl)) { $websiteUrl = 'https://' . $websiteUrl; }
    $emailValue = env('DEMO_MODE') == 'ON' ? 'admin@admin.com' : '';
    $passwordValue = env('DEMO_MODE') == 'ON' ? 'admin' : '';
@endphp
<div class="bg" aria-hidden="true" style="--login-bg:url('{{ Login_Image() }}')"><i></i><i></i><i></i><i></i></div>
<canvas id="trail" aria-hidden="true"></canvas>

<header class="top">
  <span class="pill"><b>Same day service</b>Melbourne metro</span>
  @if($contactNo !== '')
  <a class="pill plain" href="tel:{{ preg_replace('/[^0-9+]/', '', $contactNo) }}">
    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2Z"/></svg>
    {{ $contactNo }}
  </a>
  @endif
</header>

<main class="stage">
  <div class="card" id="card">
    <div class="inner">

      <div class="top-brand">
        <div class="logo">
          <img src="{{ Tab_Icon() }}" alt="{{ App_Name() }}"
               onerror="this.onerror=null;this.src='{{ asset('web-app-manifest-192x192.png') }}'">
        </div>
        <span class="eyebrow">Admin Console</span>
        <h1 id="greet">Good day, <span>Pro</span></h1>
        <p id="subline">{{ __('label.sign_in_to_your_account') }}</p>
      </div>


      <div class="alert" id="alert" role="alert">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><circle cx="12" cy="12" r="9"/><path d="M12 8v5M12 16.5v.01"/></svg>
        <span id="alertText">Invalid email or password.</span>
      </div>

      <!-- Point action/method at your backend (add your CSRF token as needed) -->
      <form id="loginForm" novalidate autocomplete="on">

        <!-- SIGN IN (email + password together) -->
        <section class="pane active" id="p1">
          <div class="field" id="fEmail">
            <input type="email" id="email" name="email" value="{{ $emailValue }}" placeholder=" " autocomplete="username" required autofocus>
            <label for="email">Email address</label>
            <svg class="ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="3"/><path d="m4 7.5 8 5.5 8-5.5"/></svg>
            <div class="err">Please enter a valid email address.</div>
          </div>

          <div class="field" id="fPass">
            <input type="password" id="password" name="password" value="{{ $passwordValue }}" placeholder=" " autocomplete="current-password" required>
            <label for="password">Password</label>
            <svg class="ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="10.5" width="16" height="10" rx="3"/><path d="M8 10.5V8a4 4 0 0 1 8 0v2.5"/></svg>
            <button type="button" class="eye" id="eye" aria-label="Show password">
              <svg class="on" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12Z"/><circle cx="12" cy="12" r="3"/></svg>
              <svg class="off" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3l18 18M10.6 5.1A10 10 0 0 1 12 5c6.4 0 10 7 10 7a17 17 0 0 1-3.2 4M6.5 6.6C3.6 8.5 2 12 2 12s3.6 7 10 7a10 10 0 0 0 4.4-1M9.9 9.9a3 3 0 0 0 4.2 4.2"/></svg>
            </button>
            <div class="err">Please enter your password.</div>
          </div>
          <div class="caps" id="caps">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 4 4 13h5v4h6v-4h5L12 4ZM9 20h6"/></svg>
            Caps Lock is on
          </div>

          <button type="submit" class="btn" id="btn">
            <span class="label">{{ __('label.login') }}</span>
            <svg class="arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            <span class="spin"></span>
          </button>
        </section>

        <!-- STEP 3 : success -->
        <section class="pane" id="p3">
          <div class="ok">
            <div class="ring">
              <svg viewBox="0 0 112 112"><defs><linearGradient id="rg" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#12344d"/><stop offset="1" stop-color="#0f9d7a"/></linearGradient></defs>
                <circle class="tr" cx="56" cy="56" r="48"/><circle class="pg" cx="56" cy="56" r="48"/></svg>
              <div class="ck"><svg width="46" height="46" viewBox="0 0 24 24"><path d="M5 12.5 10 17.5 19 7.5"/></svg></div>
            </div>
            <h2 id="okTitle">You're in!</h2>
            <p>Opening your dashboard&hellip;</p>
          </div>
        </section>
      </form>

      <div class="trust" id="trust">
        <span><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.5 10 17.5 19 7.5"/></svg>Authorised staff only</span>
        <span><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.5 10 17.5 19 7.5"/></svg>Secure session</span>
      </div>
    </div>
  </div>
</main>

<footer class="bottom">
  <span>&copy; <span id="yr">2026</span> {{ App_Name() }} &middot; Clayton South, VIC</span>
  @if($websiteTxt !== '')
  <a href="{{ $websiteUrl }}" target="_blank" rel="noopener">{{ $websiteTxt }} ↗</a>
  @endif
</footer>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script>
(function(){
  var reduce=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var coarse=window.matchMedia('(pointer: coarse)').matches;
  document.getElementById('yr').textContent=new Date().getFullYear();

  /* ── Time-aware greeting ── */
  var h=new Date().getHours(),hello=h<5?'Working late':h<12?'Good morning':h<17?'Good afternoon':'Good evening';
  document.getElementById('greet').innerHTML=hello+', <span>Admin</span>';

  /* ── Sparkle trail that follows the cursor ── */
  var cv=document.getElementById('trail'),x=cv.getContext('2d'),W,H,dpr=Math.min(window.devicePixelRatio||1,2),P=[],run=false;
  function size(){W=innerWidth;H=innerHeight;cv.width=W*dpr;cv.height=H*dpr;x.setTransform(dpr,0,0,dpr,0,0)}
  size();window.addEventListener('resize',size);
  var cols=['15,157,122','18,52,77','27,71,99','20,171,134'],lastT=0;
  function spawn(px,py){
    P.push({x:px+(Math.random()-.5)*10,y:py+(Math.random()-.5)*10,vx:(Math.random()-.5)*.8,vy:-.3-Math.random()*.7,life:0,max:38+Math.random()*30,s:3+Math.random()*6,c:cols[Math.random()*cols.length|0],r:Math.random()*3});
    if(!run){run=true;requestAnimationFrame(loop)}
  }
  function star(s){x.beginPath();x.moveTo(0,-s);x.quadraticCurveTo(0,0,s,0);x.quadraticCurveTo(0,0,0,s);x.quadraticCurveTo(0,0,-s,0);x.quadraticCurveTo(0,0,0,-s);x.fill()}
  function loop(){
    x.clearRect(0,0,W,H);
    for(var i=P.length-1;i>=0;i--){
      var p=P[i];p.life++;p.x+=p.vx;p.y+=p.vy;p.vy+=.012;
      var k=1-p.life/p.max;if(k<=0){P.splice(i,1);continue}
      x.save();x.translate(p.x,p.y);x.rotate(p.r+p.life*.05);x.fillStyle='rgba('+p.c+','+(k*.9)+')';x.shadowColor='rgba('+p.c+',.8)';x.shadowBlur=8*k;star(p.s*(.4+k*.6));x.restore();
    }
    if(P.length)requestAnimationFrame(loop);else run=false;
  }
  if(!reduce&&!coarse)window.addEventListener('pointermove',function(e){var n=performance.now();if(n-lastT>28){lastT=n;spawn(e.clientX,e.clientY)}},{passive:true});

  /* ── Sign-in form ── */
  var card=document.getElementById('card'),form=document.getElementById('loginForm'),
      p1=document.getElementById('p1'),p3=document.getElementById('p3'),
      email=document.getElementById('email'),pass=document.getElementById('password'),
      fE=document.getElementById('fEmail'),fP=document.getElementById('fPass'),btn=document.getElementById('btn'),
      alertBox=document.getElementById('alert'),alertText=document.getElementById('alertText'),
      eye=document.getElementById('eye'),caps=document.getElementById('caps'),
      subline=document.getElementById('subline'),trust=document.getElementById('trust');

  function show(p){[p1,p3].forEach(function(s){s.classList.remove('active')});p.classList.add('active')}
  function shake(){card.classList.remove('shake');void card.offsetWidth;card.classList.add('shake')}

  var emailRx=/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
  function vEmail(){var ok=emailRx.test(email.value.trim());fE.classList.toggle('invalid',!ok);return ok}
  function vPass(){var ok=pass.value.length>0;fP.classList.toggle('invalid',!ok);return ok}

  eye.addEventListener('click',function(){
    var s=pass.type==='password';pass.type=s?'text':'password';eye.classList.toggle('on',s);
    eye.setAttribute('aria-label',s?'Hide password':'Show password');pass.focus();
  });
  function capsCheck(e){if(e.getModifierState)caps.classList.toggle('show',e.getModifierState('CapsLock'))}
  pass.addEventListener('keyup',capsCheck);pass.addEventListener('keydown',capsCheck);pass.addEventListener('blur',function(){caps.classList.remove('show')});
  email.addEventListener('blur',function(){if(email.value)vEmail()});
  email.addEventListener('input',function(){if(fE.classList.contains('invalid'))vEmail();alertBox.classList.remove('show')});
  pass.addEventListener('input',function(){if(fP.classList.contains('invalid'))vPass();alertBox.classList.remove('show')});

  form.addEventListener('submit',function(e){
    e.preventDefault();
    var a=vEmail(),b=vPass();
    if(!a||!b){shake();(a?pass:email).focus();return}
    btn.classList.add('loading');alertBox.classList.remove('show');

    $.ajax({
      headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
      type:'POST',url:'{{ route("admin.save.login") }}',data:new FormData(form),
      cache:false,contentType:false,processData:false,
      success:function(resp){
        if(resp.status==200){success(resp.success)}
        else{var m=resp.errors;failure(typeof m==='string'?m:(m||[]).join(' '))}
      },
      error:function(xhr,st,err){failure(err||st)}
    });
    
  });
  function success(msg){
    btn.classList.remove('loading');
    document.querySelector('.top-brand h1').innerHTML='All <span>spotless</span>.';
    subline.textContent=msg||'Authentication successful.';
    trust.style.display='none';
    show(p3);
    if(!reduce)for(var i=0;i<26;i++)(function(i){setTimeout(function(){var r=card.getBoundingClientRect();spawn(r.left+Math.random()*r.width,r.top+Math.random()*r.height*.7)},i*45)})(i);
    setTimeout(function(){window.location.replace('{{ route("admin.dashboard") }}')},1500);
  }
  function failure(msg){btn.classList.remove('loading');alertText.textContent=msg||'Invalid email or password. Please try again.';alertBox.classList.add('show');shake();pass.select()}
  window.__loginFailure=failure;
})();
</script>
</body>
</html>
