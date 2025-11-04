const menuDiv = document.querySelector('.nav-menu div:first-child');
const openBtn = document.getElementById('open-menu');
const closeBtn = document.getElementById('close-menu');

openBtn.addEventListener('click', function () {
    // اول کلاس بستن رو حذف می‌کنیم
    menuDiv.classList.remove('closing');
    // نمایش حالت باز
    menuDiv.classList.add('active');
});

closeBtn.addEventListener('click', function () {
    // حالت بستن
    menuDiv.classList.remove('active');
    menuDiv.classList.add('closing');

    // بعد از پایان انیمیشن، کامل مخفی کنیم
    setTimeout(() => {
    }, 400); // برابر زمان transition
});
