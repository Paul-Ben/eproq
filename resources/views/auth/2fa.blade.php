<!DOCTYPE html>
<html lang="en" class="bg-gray-900">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>2FA Code Input</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Glow effect for futuristic vibe */
    input:focus {
      outline: none;
      box-shadow: 0 0 10px #4ade80, 0 0 20px #22c55e;
      border-color: #22c55e;
    }
  </style>
</head>

<body
  class="flex items-center justify-center min-h-screen bg-gradient-to-tr from-gray-900 via-gray-800 to-gray-900 text-white px-4">

  <div
    class="text-center w-full max-w-md sm:max-w-lg md:max-w-xl lg:max-w-2xl p-6 sm:p-8 bg-gray-800 bg-opacity-70 rounded-xl shadow-lg mx-auto">
    <h1 class="text-2xl sm:text-3xl font-extrabold mb-6 tracking-wide">Enter Your 2FA Code</h1>
    <p class="mb-8 text-gray-400 text-sm sm:text-base">Please enter the 6-digit code sent to your device.</p>

    <form method="POST" action="{{ route('2fa.store') }}" id="twoFactorForm"
      class="flex flex-wrap justify-center gap-3 sm:gap-4" autocomplete="off" onsubmit="return handleSubmit(event)">
      @csrf
      <input type="hidden" name="two_factor_code" id="two_factor_code" />

      <!-- Each input shrinks on small screens -->
      <input type="text" inputmode="numeric" maxlength="1" pattern="[0-9]*"
        class="w-12 sm:w-14 h-14 text-center text-2xl sm:text-3xl font-mono bg-gray-900 border border-gray-700 rounded-lg shadow-inner transition focus:ring-4 focus:ring-green-500"
        id="digit-1" />
      <input type="text" inputmode="numeric" maxlength="1" pattern="[0-9]*"
        class="w-12 sm:w-14 h-14 text-center text-2xl sm:text-3xl font-mono bg-gray-900 border border-gray-700 rounded-lg shadow-inner transition focus:ring-4 focus:ring-green-500"
        id="digit-2" />
      <input type="text" inputmode="numeric" maxlength="1" pattern="[0-9]*"
        class="w-12 sm:w-14 h-14 text-center text-2xl sm:text-3xl font-mono bg-gray-900 border border-gray-700 rounded-lg shadow-inner transition focus:ring-4 focus:ring-green-500"
        id="digit-3" />
      <input type="text" inputmode="numeric" maxlength="1" pattern="[0-9]*"
        class="w-12 sm:w-14 h-14 text-center text-2xl sm:text-3xl font-mono bg-gray-900 border border-gray-700 rounded-lg shadow-inner transition focus:ring-4 focus:ring-green-500"
        id="digit-4" />
      <input type="text" inputmode="numeric" maxlength="1" pattern="[0-9]*"
        class="w-12 sm:w-14 h-14 text-center text-2xl sm:text-3xl font-mono bg-gray-900 border border-gray-700 rounded-lg shadow-inner transition focus:ring-4 focus:ring-green-500"
        id="digit-5" />
      <input type="text" inputmode="numeric" maxlength="1" pattern="[0-9]*"
        class="w-12 sm:w-14 h-14 text-center text-2xl sm:text-3xl font-mono bg-gray-900 border border-gray-700 rounded-lg shadow-inner transition focus:ring-4 focus:ring-green-500"
        id="digit-6" />
    </form>

    <button type="submit" form="twoFactorForm"
      class="mt-8 w-full py-3 bg-green-600 hover:bg-green-500 rounded-lg font-semibold text-lg sm:text-xl tracking-wide transition">
      Verify
    </button>

    <p id="error" class="mt-4 text-red-500 font-semibold hidden">Please enter all 6 digits.</p>
  </div>

  <script>
    const inputs = Array.from(document.querySelectorAll('form#twoFactorForm input[type="text"]'));

    inputs.forEach((input, idx) => {
      input.addEventListener('input', (e) => {
        const value = e.target.value;
        if (/^[0-9]$/.test(value)) {
          if (idx < inputs.length - 1) {
            inputs[idx + 1].focus();
          }
        } else {
          e.target.value = '';
        }
      });

      input.addEventListener('keydown', (e) => {
        if (e.key === 'Backspace' && !input.value && idx > 0) {
          inputs[idx - 1].focus();
        }
      });

      input.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft' && idx > 0) {
          inputs[idx - 1].focus();
        }
        if (e.key === 'ArrowRight' && idx < inputs.length - 1) {
          inputs[idx + 1].focus();
        }
      });
    });

    function handleSubmit(e) {
      const code = inputs.map(input => input.value).join('');
      const errorEl = document.getElementById('error');

      if (code.length < 6 || !/^\d{6}$/.test(code)) {
        errorEl.classList.remove('hidden');
        inputs[0].focus();
        e.preventDefault();
        return false;
      }
      errorEl.classList.add('hidden');

      document.getElementById('two_factor_code').value = code;

      return true;
    }
  </script>

</body>

</html>
