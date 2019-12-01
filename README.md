# WEB-Login-PESBUK

---
## Requirements 

Berikut ini alat-alat yang dibutuhkan:
* Web Browser: Google Chrome, Opera, Firefox, dll;
* Server: PHP ``(versi 5.6 ke atas)``, Apache2/Nginx, dan MySQL.

## Step 

1. Upgrade Versi php pada Centos 7 harus 5.6 ke atas disini saya memakai php versi 7.
2. Remove paket php di centos 7, 

```BASH
# yum remove php-common

# rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
# rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm

# yum install php70w php70w-mysql phpmyadmin -y
# php -v
```

3. install paket git untuk mengunduh source code lewat github.

```BASH
# yum install git -y
# cd /var/www/html/login
# git clone https://github.com/ammarun11/web-login-sederhana.git
# mv web-login-sederhana/* .
```

4. Sesuaikan environtment database Centos 7 kita dengan code ``config.php`` Jika belum buat database nya buat dulu ya di ip-server/phpmyadmin.

```php
<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "qwe";
$db_name = "pesbuk"; 

try {    
    //create PDO connection 
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}
```

5. Import tabel sql untuk web login kita melalui ``phpmyadmin``

```sql
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.svg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
```

![gambar5](https://raw.githubusercontent.com/ammarun11/web-login-sederhana/master/img/tabeluser.png)


6. Buka Web browser dengan url ip server centos 7,  register > login > BOOM!

# HASIL

![gambar1](https://raw.githubusercontent.com/ammarun11/web-login-sederhana/master/img/dashboard.png)

![gambar2](https://raw.githubusercontent.com/ammarun11/web-login-sederhana/master/img/register.png)

![gambar3](https://raw.githubusercontent.com/ammarun11/web-login-sederhana/master/img/login.png)

![gambar4](https://raw.githubusercontent.com/ammarun11/web-login-sederhana/master/img/timeline.png)

## Referensi
* **[https://www.petanikode.com/php-login-register/](https://www.petanikode.com/php-login-register/)**
* **[https://www.rosehosting.com/blog/install-php-7-on-centos-7/](https://www.rosehosting.com/blog/install-php-7-on-centos-7/)**
