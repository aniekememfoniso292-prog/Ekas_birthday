const $ = id => document.getElementById(id);
const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;

/* Toast */
let tt;
function toast(msg){const t=$('toast');t.textContent=msg;t.classList.add('show');clearTimeout(tt);tt=setTimeout(()=>t.classList.remove('show'),2600)}

/* Countdown */
function tick(){
  const now=new Date(), y=now.getFullYear();
  const start=new Date(y,11,2), end=new Date(y,11,2,23,59,59);
  if(now>=start && now<=end){
    $('clock').hidden=true; $('bday').hidden=false;
    if(!tick.party){tick.party=true; confetti();}
    return;
  }
  $('clock').hidden=false; $('bday').hidden=true;
  const target = now>end ? new Date(y+1,11,2) : start;
  const diff=target-now;
  $('d').textContent=Math.floor(diff/864e5);
  $('h').textContent=String(Math.floor(diff%864e5/36e5)).padStart(2,'0');
  $('m').textContent=String(Math.floor(diff%36e5/6e4)).padStart(2,'0');
  $('s').textContent=String(Math.floor(diff%6e4/1e3)).padStart(2,'0');
}
if($('clock')){tick(); setInterval(tick,1000);}

/* Gifts */
const gifts=[...document.querySelectorAll('.gift')];
let giftName='';
function updatePick(){
  const amt=Number($('amount').value);
  const money=amt>0 ? '₦'+amt.toLocaleString('en-NG') : '';
  if(giftName && money) $('pick').textContent=`${giftName} gift: send ${money} to the account below. Thank you!`;
  else if(money) $('pick').textContent=`Send ${money} to the account below. Thank you!`;
  else if(giftName) $('pick').textContent=`You picked the ${giftName}. Now type the amount you want to send.`;
  else $('pick').textContent='Choose a gift and type the amount you want to send.';
}
gifts.forEach(g=>g.addEventListener('click',()=>{
  gifts.forEach(x=>x.setAttribute('aria-pressed',x===g));
  giftName=g.dataset.n; updatePick();
  if(!reduce) confetti(40);
}));
$('amount')&&$('amount').addEventListener('input',updatePick);
$('copy')&&$('copy').addEventListener('click',async()=>{
  const txt=$('acct').textContent.trim();
  try{await navigator.clipboard.writeText(txt);toast('Account number copied 💛')}
  catch(e){const r=document.createRange();r.selectNodeContents($('acct'));const s=getSelection();s.removeAllRanges();s.addRange(r);toast('Press copy on your keyboard or menu')}
});

/* Wishes: send without reloading */
$('wishForm')&&$('wishForm').addEventListener('submit',async e=>{
  e.preventDefault();
  const f=e.target, n=$('note'), b=$('send');
  b.disabled=true; n.className='note'; n.textContent='Sending...';
  try{
    const r=await fetch(f.action,{method:'POST',body:new FormData(f)});
    if(!r.ok) throw new Error();
    f.reset(); n.className='note ok'; n.textContent='Your wish was sent. Thank you!';
    toast('Wish sent 💖'); if(!reduce) confetti(60);
  }catch(err){
    n.className='note err'; n.textContent='Your wish did not send. Check your connection and try again.';
  }finally{b.disabled=false}
});

/* Gold sparkle background */
const cv=$('sparkle'), cx=cv&&cv.getContext('2d'); let W,H,P=[];
function size(){W=cv.width=cv.offsetWidth;H=cv.height=cv.offsetHeight}
function mk(){return{x:Math.random()*W,y:Math.random()*H,r:Math.random()*1.8+.4,v:Math.random()*.25+.05,a:Math.random()}}
if(cv){size(); P=Array.from({length:70},mk); addEventListener('resize',size);}
function draw(){
  cx.clearRect(0,0,W,H);
  for(const p of P){
    p.y-=p.v; p.a+=.015; if(p.y<-5){p.y=H+5;p.x=Math.random()*W}
    cx.globalAlpha=(Math.sin(p.a)+1)/2*.8;
    cx.fillStyle='#f6e27a'; cx.beginPath(); cx.arc(p.x,p.y,p.r,0,7); cx.fill();
  }
  if(!reduce) requestAnimationFrame(draw);
}
if(cv) draw();

/* Confetti burst */
function confetti(n=140){
  if(reduce) return;
  const c=document.createElement('canvas'); c.style.cssText='position:fixed;inset:0;width:100%;height:100%;pointer-events:none;z-index:30';
  c.width=innerWidth; c.height=innerHeight; document.body.appendChild(c);
  const x=c.getContext('2d'), cols=['#f6e27a','#d4af37','#9c7a1c','#ffffff'];
  const bits=Array.from({length:n},()=>({x:c.width/2,y:c.height*.6,vx:(Math.random()-.5)*14,vy:-Math.random()*14-4,s:Math.random()*7+4,c:cols[Math.random()*4|0],r:Math.random()*6}));
  let f=0;
  (function go(){
    x.clearRect(0,0,c.width,c.height);
    bits.forEach(b=>{b.vy+=.35;b.x+=b.vx;b.y+=b.vy;b.r+=.2;x.save();x.translate(b.x,b.y);x.rotate(b.r);x.fillStyle=b.c;x.fillRect(-b.s/2,-b.s/4,b.s,b.s/2);x.restore()});
    if(++f<130) requestAnimationFrame(go); else c.remove();
  })();
}