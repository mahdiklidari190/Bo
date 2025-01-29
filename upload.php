<?php
// بررسی اینکه آیا فایلی ارسال شده است
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // بررسی نوع فایل (در اینجا فقط JPG)
    if ($file['type'] === 'image/jpeg') {
        // تعیین مسیر ذخیره فایل
        $uploadDirectory = 'uploads/';
        
        // اگر دایرکتوری آپلود وجود ندارد، آن را بسازید
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        // نام فایل مقصد
        $filePath = $uploadDirectory . basename($file['name']);

        // انتقال فایل به دایرکتوری آپلود
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            echo "فایل " . $file['name'] . " با موفقیت آپلود شد!";
        } else {
            echo "خطا در آپلود فایل.";
        }
    } else {
        echo "فقط فایل‌های JPG مجاز هستند.";
    }
} else {
    echo "هیچ فایلی ارسال نشده است.";
}
?>
