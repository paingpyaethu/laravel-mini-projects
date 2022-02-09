@if(session('sweetAlert'))
<script>

   let alertInfo = @json(session('sweetAlert'))

   Swal.fire({
      icon: alertInfo.icon,
      title: alertInfo.title,
      text: alertInfo.text
   })

</script>
@endif