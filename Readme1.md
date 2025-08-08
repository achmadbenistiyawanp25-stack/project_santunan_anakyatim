<!-- saya tadi membuat cors untuk mengghubungkan frontend dengan backend,memperbaiki data anak mulai dari controller, migration, dan seeder yaitu dibagian jnis kelamin masalahnya enum yang harusnya laki-laki malah laki - laki. dan membantu menyelesaikan error frontend pada bagian axios(untuk menghubungkan front end dan backend).
02/08/2025 -->
<!-- 
saya telah mambuat migrasi,controller, model, dan route untuk notifikasi, setelah itu menambah syntax seperti ini $table->string('alamat_wali')->nullable();
$table->string('no_pendamping')->nullable(); untuk tambah tabel di migrasi pengajuan anak dan data anak, dan menambahkan ini $table->string('jenis')->nullable();
$table->date('tanggal')->nullable(); di upload artikel, lalu menambahkan kolom foto_profil di tabel user,admin, relawan contoh syntax $table->string('foto_profil')->nullable(); , dan menambah kolom tanggal di upload artikel contoh syntax $table->date('tanggal')->nullable();
 $table->string('jenis', 100)->nullable();
 dan memperbaiki foreign key dari pengajuan anak ke tabel user -->

 php artisan serve --host=0.0.0.0 --port=8000


saya tadi memperbaiki error pada bagian notifikasi seeder yang dimana terdapat typo di syntax nya setelah itu memperbaiki migrasi notifikasi yang sama terdapat typo didalamnya, setelah itu memperbaiki error di bagian cors untuk sambungan ke frontend, setelah itu migrasi data anak didalamnya terdapat syntax yang seharusnya tidak ada tetapi malah ada karena ketidak sengajaan.
   