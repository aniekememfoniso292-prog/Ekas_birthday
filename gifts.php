<?php
$title = 'Send EKAS a gift 🎁';
require __DIR__ . '/includes/header.php';
?>
<main>
  <section id="gifts"><div class="wrap">
    <h2>Send a gift</h2>
    <p class="lead">Pick a gift, type the amount you want to send, then send it to the account below. Every bit makes the day brighter.</p>
    <div class="gifts" id="giftList">
      <button class="gift" data-n="Rose" aria-pressed="false"><span class="ico">🌹</span><span class="nm">Rose</span></button>
      <button class="gift" data-n="Cake" aria-pressed="false"><span class="ico">🎂</span><span class="nm">Cake</span></button>
      <button class="gift" data-n="Crown" aria-pressed="false"><span class="ico">👑</span><span class="nm">Crown</span></button>
      <button class="gift" data-n="Bouquet" aria-pressed="false"><span class="ico">💐</span><span class="nm">Bouquet</span></button>
    </div>
    <div class="pay">
      <h3>Pay with Opay</h3>
      <label class="amt-field">Amount you want to send (₦)
        <input type="number" id="amount" min="100" step="100" inputmode="numeric" placeholder="For example 5000">
      </label>
      <p class="pick" id="pick" aria-live="polite">Choose a gift and type the amount you want to send.</p>
      <div class="acct">
        <dl>
          <dt>Name</dt><dd>Edidiong Aniekeme</dd>
          <dt>Bank</dt><dd>Opay Digital Services</dd>
          <dt>Account</dt><dd class="num" id="acct">8034127171</dd>
        </dl>
        <button class="btn" id="copy" type="button">Copy account number</button>
      </div>
    </div>
  </div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>