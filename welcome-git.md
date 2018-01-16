# Welcome To The Git World

Tutuorial SIngkat menggunakan Git untuk collaboration

## Langkah Pertama

Pastikan Kamu punya file terbaru dari remote repository

    git checkout master #Pindah ke branch Utama
    git pull origin master #dapatkan file terbaru
Buat branch baru untuk mengembangkan fitur baru

    git checkout -b nama-branch #buat branch baru
 Selamat anda sudah berada di branch baru silahkan lakukan edit sepuasanya
 

    ....................
   Setelah selesai edit semua file saat nya commit
   

    git add . 
    git commit -m "isi pesan"
Setelah commit berpuas ria saatnya buat pull request untuk di merge ke branch master/utama

    git push -u origin nama-branch
 Lakukan pull request di github
 

    .............
Bila ada revisi maka lakukan ritual commit dan push kembali

    git add .
    git commit -m "isi revisi"
    git push
Setelah merge selesai di lakukan segera dapatkan source code terbaru

    git checkout master
    git pull origin master
    git branch -d nama-branch
Selanjutnya ulangi ke langkah pertama Happy Coding :)


----------


----------


----------


