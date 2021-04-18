<!-- Efecto de aparicion -->
<script src="js/index.js"></script>

<!-- Fontawesome -->
<script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>

<!-- LINK ACTIVADO -->
<script>
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll("a");
    const menuLength = menuItem.length;
    for (let i = 0; i < menuLength; i++) {
    if (menuItem[i].href === currentLocation) menuItem[i].className = "active";
    }
</script>

<!-- Ir arriba -->
<script>
    $(document).ready(function(){
        $('.go-top').click(function(){
            $('body, html').animate({ scrollTop: '0px' },300);
        });
        $(window).scroll(function(){
            if($(this).scrollTop() > 400) $('.go-top').slideDown(300);
            else $('.go-top').slideUp(300);                
        });
    })
</script>