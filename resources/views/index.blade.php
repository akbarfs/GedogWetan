@extends('layouts.apps')
@section('main-content')
  <!-- ======= hero Section ======= -->
  <section id="hero">
  @foreach ($slide as $Slide)
    <div class="hero-content" data-aos="fade-up">
      <h2>Selamat Datang di desa<br>Gedog</span>Wetan</span></h2>
      <div>
        <a href="#berita" class="btn-get-started scrollto">Baca Berita</a>
        <a href="#pengumuman" class="btn-projects scrollto">Pengumuman</a>
      </div>
    </div>

    <div class="hero-slider swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image: url('{{asset('assets/img/'.$Slide->gambar)}}');"></div>
      </div>
    </div>
    @endforeach

  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="about">
    @foreach ($konten as $Konten)
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>{{$Konten->judul}}</h2>
          {!!$Konten->isi!!}
        </div>
    @endforeach
      </div>
    </section><!-- End Clients Section -->

    <div id="berita">
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Berita</h2>
          <a href="{{url('/allberita')}}"><p>Berita & Artikel</p></a>
        </div>
        @if (!empty($data_berita))
        @foreach ($data_berita as $key => $Berita)
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">        
          <div class="portfolio-item filter-web">
            <a href="{{url('/detailberita.'.$Berita->id_berita.'.detailberita')}}"><img src="{{asset('assets/img/'.$Berita->gambar)}}"  style="object-fit: cover;width:100%;height: 200px;">
            <div class="portfolio-info">
              <h4>{{$Berita->judul}}</h4>
              <p>kategori : {{$Berita->kategori->kategori}}</p>
            </div></a>
          </div>
          </div>
          @endforeach
          @endif
        </div>
      </div>
    </section>

    <div id="pengumuman">
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Pengumuman</h2>
        </div>

        @foreach ($pengumuman as $Pengumuman)
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        
          <div class=" portfolio-item filter-web">
            <a href="{{url('/detailpengumuman.'.$Pengumuman->id_pengumuman.'.detailpengumuman')}}"><img src="{{asset('admin/assets/img/'.$Pengumuman->gambar)}}" style="object-fit: cover;width:100%;height: 150px;">
            <div class="portfolio-info">
              <h4>{{$Pengumuman->judul}}</h4>
              <p>tanggal : {{$Pengumuman->updated_at}}</p>
            </div></a>
          </div>
        </div>
        @endforeach
      </div>
    </section>
    </div>
    <!-- ======= Call To Action Section ======= -->
    <div id="potensidesa">
    <section id="call-to-action">
      <div class="container" data-aos="zoom-out">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3 class="cta-title" style="color:white;">Potensi</h3>
            <p class="cta-text">Potensi dan produk unggul desa.</p>
          </div>
          <div class="w3-content w3-display-container">
@foreach ($potensi as $Potensi)
<div class="w3-display-container mySlides">
  <img src="{{asset('assets/img/'.$Potensi->gambar)}}" style="width:100%;height: 250px;object-fit:cover;">
  <div class="w3-display-bottomleft w3-large w3-container w3-padding-16" style="color:white;">
  {{$Potensi->potensi}}<br>
    <p style="font-size:10px;color:white;">{{$Potensi->deskripsi}}</p>
  </div>
</div>
</div>
@endforeach

<button class="w3-button w3-display-left w3-blue" onclick="plusDivs(-1)">&#10094;</button>
<button class="w3-button w3-display-right w3-blue" onclick="plusDivs(1)">&#10095;</button>

</div>
          </div>
        </div>
      </div>
    </section><!-- End Call To Action Section -->

    <!-- ======= Team Section ======= -->
    <section id="team">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Pengurus Organisasi</h2>
        </div>

        <div class="row">
        @foreach ($pengurus as $Pengurus)
          <div class="col-lg-3 col-md-6">
            <div class="member">
            <div class="details">
            <h4>{{$Pengurus->organisasi->organisasi}}</h4></div><a href="{{url('/detailorganisasi.'.$Pengurus->id_organisasi.'.detailorganisasi')}}">
              <div class="pic"><img src="{{asset('assets/img/'.$Pengurus->foto)}}" alt=""></div>
              <div class="details">
                <h4>{{$Pengurus->nama}}</h4>
                <span>Jabatan : {{$Pengurus->jabatan->jabatan}}</span>
              </div></a>
            </div>
          </div>
        @endforeach
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Contact Us</h2>
        </div>

        <div class="row contact-info">
        @foreach ($kontak as $Kontak)
          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3>{{$Kontak->judul}}</h3>
              <address>{{$Kontak->kontak}}</address>
            </div>
          </div>
        @endforeach


        </div>
      </div>

      <center>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15795.718936340556!2d112.68489969501243!3d-8.209821455466528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd61eddaf7a1d25%3A0xa261b88f1f1452f4!2sGedog%20Wetan%2C%20Kec.%20Turen%2C%20Kabupaten%20Malang%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1656476739774!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </center>

      <!-- <div class="container">
        <div class="form">
          <form action="{{url('/')}}" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>

            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>

            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div> -->

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  @endsection