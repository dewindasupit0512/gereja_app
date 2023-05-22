@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('/css/contact-page.css') }}">
@endpush


<div class="contact-page">
    <div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="img/slide/lima.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title"><span>Contact</span> / Lokasi</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact -->

	<div class="contact">
		<div class="container">
			<div class="row">

				<!-- Contact Info -->
				<div class="col-lg-6">
					<div class="section_title"><h2>GEREJA PANTEKOSTA di INDONESIA</h2></div>
					<div class="contact_text">
						<p></p>
					</div>
					<ul class="contact_about_list">
						<li><div class="contact_about_icon"><img src="images/phone-call.svg" alt=""></div><span>+62852-7794-8885</span></li>
						<li><div class="contact_about_icon"><img src="images/envelope.svg" alt=""></div><span>gpdiapostolos@gmail.com</span></li>
						<li><div class="contact_about_icon"><img src="images/placeholder.svg" alt=""></div><span>Jln.Ibantong Dalam. Kel Tumobui. Kotamobagu Timur</span></li>
					</ul>
				</div>

				<!-- Contact Form -->
				<div class="col-lg-6 form_col">
					  <section id="contact" class="wow fadeInUp">
                        <div class="container">
                            <div class="form">
                            <div id="sendmessage">KONSULTASI / PESAN</div>
                            <div id="errormessage"></div>
                                <form id="message-form" wire:submit.prevent='store_konsultasi'>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input wire:model='name_input' type="text" name="txtnama" class="form-control" id="name" placeholder="Nama Lengkap" data-rule="minlen:4" required oninvalid="this.setCustomValidity('Nama Lengkap Masih Kosong')" oninput="setCustomValidity('')"/>
                                            <!-- <div class="validation"></div> -->
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input wire:model='email_input' type="email" class="form-control" name="txtemail" id="email" placeholder="Email" data-rule="email" required oninvalid="this.setCustomValidity('Email Masih Kosong')" oninput="setCustomValidity('')"/>
                                            <!-- <div class="validation"></div> -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input wire:model='phone_input' type="text" class="form-control" name="txthandphone" id="subject" placeholder="HandPhone" required oninvalid="this.setCustomValidity('Hanphone Masih Kosong')" oninput="setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <textarea wire:model='message_input' class="form-control" name="txtpesan" rows="5" data-rule="required" data-msg="Pesan Tidak Boleh Kosong" placeholder="Message"></textarea>
                                        <!-- <div class="validation"></div> -->
                                    </div>
                                    <input type="submit" name="btnsimpan" class="btn btn-primary" value="Kirim Pesan">
                                </form>
                            </div>
                        </div>
                        </section>
				</div>
			</div>

			<div class="row map_row">
				<div class="col">

					<!-- Contact Map -->

					<div class="contact_map">

						<!-- Google Map -->
						
						<div class="map">
							<div id="google_map" class="google_map">
								<div class="map_container">
									<div id="map">
										<!-- <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.8356631020224!2d98.67492329415798!3d3.6249936281043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zM8KwMzcnMzAuMSJOIDk4wrA0MCcyOS44IkU!5e0!3m2!1sid!2sid!4v1537043333354" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->


										<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.852773461521!2d98.66890516369078!3d3.6211052679731277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30313202ab8da46b%3A0x7065dd21d09b8e87!2sGiki!5e0!3m2!1sid!2sid!4v1537846152017" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
									</div>
								</div>
							</div>
						</div>


					</div>

				</div>
			</div>
		</div>
	</div>
</div>
