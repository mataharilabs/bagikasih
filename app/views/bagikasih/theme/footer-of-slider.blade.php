{{ HTML::script('assets/assets/js/idangerous.swiper-2.1.min.js'); }}
<script>
var mySwiper = new Swiper('.swiper-container',{
  pagination: '.pagination',
  loop:true,
  grabCursor: true,
  paginationClickable: true
})
$('.arrow-left').on('click', function(e){
  e.preventDefault()
  mySwiper.swipePrev()
})
$('.arrow-right').on('click', function(e){
  e.preventDefault()
  mySwiper.swipeNext()
})
</script>