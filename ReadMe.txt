Nama	: Andreas Steven
NIM	: 00000020150
Soal	: 04
Kelas	: EL

Saat folder website dibuka dari browser akan automatis masuk ke Index.php yang isinya hanya header() yang meredirect
ke Tampilan_Login.php yang menjadi tampilan awal dari web. Pada saat login akan ada pengecekan apakah user
merupakan Admin, Manager, Kasir, maupun Pembeli. Selain pengecekan itu akan dilakuakn pula pengecekan apakah user id yang dugunakan terdaftar.

Saat User masuk sebagai Admin (ID: 1000. PW: admin) akan terdapat tampilan table yang berisikan data dari seluruh user, di sini pula Admin 
dapat melakukan penambahan user (register) dengan mengklik Add User, ID dari User baru tidak perlu diinput karena sudah secara otomatis akan bertambah. 
Admin juga dapat melakukan pengeditan data diri dari setiap user dengan mengklik button edit (bergambar pena/pensil) dan didalamnya sudah 
ada data User yang ingin diedit. Selain itu Admin dapat menghapus user dengan mengklik button delete (bergambar keranjang sampah).

Saat user masuk sebagai Manager (ID: 1001. PW: manager02) akan terdapat tampilan table yang berisikan data barang yang ada di toko. Manager dapat melakukan
penambahan data dengan button tombol Add, ID dari Barang baru tidak perlu diinput karena sudah secara otomatis akan bertambah selain itu jumlah dan harga diberi 
pelindungan agar Manager tidak memasukkan jumlah dan harga = 0 atau < 0. Manager juga dapat mengedit data barang yang sudah ada dengan mengklik 
button edit (bergambar pena/pensil) dan sama seperti Admin sudah ada data Barang yang indin diedit. Selain itu Manager dapat menghapus user dengan mengklik 
button delete (bergambar keranjang sampah).

Saat user masuk sebagai Kasir (ID: 1002/1003. PW: kasir02/kasir03 ) akan terdapat tampilan table yang berisikan data barang yang ada di toko. 
Kasir hanya dapat mengedit data barang berupa stock dan harga dengan mengklik button edit (bergambar pena/pensil) disini juga sama seperti pada Manager jumlah
stock dan harga diberi perlindungan agar Kasir tidak menginput jumlah stock dan harga = 0 atau < 0. Sama seperti yang lain sudah terdapat 
data Barang yang inigin diedit.

Saat user masuk sebagai Pembeli (ID: 1004/1005 PW: pembeli04/pembeli05) akan terdapat tampilan card yang berisikan data barang yang ada di toko 
beserta harga dan stocknya. Pembeli hanya dapat melihat detail dari data barang yang sudah ada dengan mengklik button View.

Disetiap page (kecuali login) terdapat header, didalam header tersebut terdapat button About yang dapat diklik dan akan menampilkan data diri pembuat. Saat user 
ingin kembali ke page sebelumnya user hanya perlu mengklik logo UShop dan akan terbuka tampilan awal dari setiap role yang ada.

User dapat melakukan logout dimanapun kecuali pada page Edit dan Add disetiap role idi dimaksudkan agar user dapat menyelesaikan kegiatannya dalam 
mengedit atau menambah data. Jika User berada pada page Edit, Add atu View (Pembeli) maka User harus kembali ke tampilan awal dengan mengklik tombol 
Cancle atau Back (Pembeli) baru User dapat melakukan logout.

refrensi: https://colorlib.com/