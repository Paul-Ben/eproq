@extends('layouts.landing')
@section('content')
    <main>
			<div
				class="flex flex-col items-center justify-center min-h-screen mx-auto md:flex-row">
				<!-- Left Section: Contact Form -->
				<div class="w-full p-8 md:w-1/3">
					<h2
						class="font-sora font-bold text-[28px] leading-[120%] tracking-[0%] text-[#101828] mb-4">
						Get in touch
					</h2>
					<p
						class="mb-5 font-sora font-normal text-[19px] leading-[26.6px] tracking-[0%] text-[#667085]">
						Our friendly team would love to hear from you.
					</p>

					<form class="space-y-3">
						<div class="flex flex-col gap-4 md:flex-row">
							<div>
								<label
									class="mb-4 font-jaka font-bold text-[13px] leading-[120%] tracking-[0%]"
									for="firstname">
									First Name
								</label>
								<input
									type="text"
									placeholder="First name"
									class="w-full p-3 rounded border border-gray-600 bg-transparent placeholder-gray-500 font-jaka text-base leading-[24.4px] tracking-[0%] focus:outline-none focus:ring-2 focus:ring-green-500" />
							</div>
							<div>
								<label
									class="mb-2 font-jaka font-bold text-[13px] leading-[120%] tracking-[0%]"
									for="lastname">
									Last Name
								</label>
								<input
									type="text"
									placeholder="Last name"
									class="w-full p-3 rounded border border-gray-600 bg-transparent placeholder-gray-500 font-jaka text-base leading-[24.4px] tracking-[0%] focus:outline-none focus:ring-2 focus:ring-green-500" />
							</div>
						</div>

						<div>
							<label
								class="mb-2 font-jaka font-bold text-[13px] leading-[120%] tracking-[0%]"
								for="email">
								Email
							</label>
							<input
								type="email"
								placeholder="you@company.com"
								class="w-full p-3 rounded border border-gray-600 bg-transparent placeholder-gray-500 font-jaka text-base leading-[24.4px] tracking-[0%] focus:outline-none focus:ring-2 focus:ring-green-500" />
						</div>

						<div>
							<label
								class="mb-2 font-jaka font-bold text-[13px] leading-[120%] tracking-[0%]"
								for="phone">
								Phone Number
							</label>

							<div class="flex gap-2">
								<select
									class="p-3 text-white bg-transparent border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-green-500">
									<option value="NGN" selected>NGN</option>
									<!-- Add other currencies/codes here if needed -->
								</select>
								<input
									type="tel"
									placeholder="+234 (814) 000–0000"
									class="w-full p-3 rounded border border-gray-600 bg-transparent placeholder-gray-500 font-jaka text-base leading-[24.4px] tracking-[0%] focus:outline-none focus:ring-2 focus:ring-green-500" />
							</div>
						</div>

						<div>
							<label
								class="mb-2 font-jaka font-bold text-[13px] leading-[120%] tracking-[0%]"
								for="message">
								Message
							</label>
							<textarea
								placeholder="Message"
								rows="3"
								class="w-full p-3 rounded border border-gray-600 bg-transparent placeholder-gray-500 font-jaka text-base leading-[24.4px] tracking-[0%] focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
						</div>

						<label class="inline-flex items-center space-x-2">
							<input
								type="checkbox"
								class="text-green-500 bg-gray-800 border-gray-600 form-checkbox" />
							<span
								class="font-jaka font-normal font-base leading-[22.4px] tracking-[0%] text-gray-500"
								>You agree to our friendly privacy policy.</span
							>
						</label>

						<button
							type="submit"
							class="w-full bg-green-800 hover:bg-green-600 text-white py-3 px-5 rounded font-jaka font-normal text-base leading-[22.4px] tracking-[0%]">
							Send message
						</button>
					</form>
				</div>

				<!-- Right Section: Image -->
				<div
					class="w-full md:w-1/3 h-[500px] md:h-auto flex items-center justify-center bg-white">
					<img
						src="{{asset('/assets/images/contact-image.png')}}"
						alt="Handshake"
						class="w-[500px] h-auto object-contain" />
				</div>
			</div>
		</main>
@endsection