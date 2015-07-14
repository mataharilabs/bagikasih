  
$('#satu').click(function(e)
  {
    e.preventDefault();
    var intro = introJs();
    intro.setOption('showProgress', 'true');
    
    intro.setOptions({
      steps: [
        {
          element: '#satu',
          intro: "Hai, saya Ahadian, di sini saya akan membantu Anda mengenal Bagikasih. klik Next untuk melanjutkan!",
          position: 'top',
        },
        {
          position: 'bottom',
          element: '#dua',
          intro: "Untuk dapat bergabung dengan Bagikasih, Anda bisa mendaftarkan akun anda sekarang",
        },
        {
          position: 'top',
          element: '#tiga',
          intro: 'Saat ini, Bagikasih sudah melaksanakan aksi sosial di beberapa kota besar di Indonesia',
        },
        {
          position: 'top',
          element: '#empat',
          intro: 'Mari berbagi kasih pada yang membutuhkan'
        },
        {
          position: 'bottom',
          element: '#lima',
          intro: 'Satu langkah lagi untuk membuat aksi sosial. Klik button mulai segera dan buat aksi sosial'
        }
      ]
    });
    
    intro.setOption('showBullets', 'true');
    intro.start();
  });