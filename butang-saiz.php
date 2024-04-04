<!-- Fungsi mengubah saiz tulisan bagi kepelbagaian pengguna. -->

<script>

function ubahsaiz(gandaan) {
    // Mendapatkan saiz semasa tulisan pada jadual.
    var saiz = document.getElementById("saiz");
    var saiz_semasa = saiz.style.fontSize || 1;

    /* Menyemak jika pengguna menekan butang, nilai yang akan dihantar...
        butang reset - nilai 2 dihantar   - kembali kepada saiz asal tulisan
        butang +     - nilai 1 dihantar   - besarkan saiz tulisan
        butang -     - nilai -1 dihantar  - kecilkan saiz tulisan
     */ 
    if(gandaan==2)
    {
        saiz.style.fontSize = "1em";
    } 
    else 
    {
        saiz.style.fontSize = ( parseFloat(saiz_semasa) + (gandaan * 0.2)) + "em";
    }
}
</script>

<style>
input[type=button] {
  background-color: white;
  border: black;
  border-style: solid;
  border-width: 2px;
  font-family:Century Gothic;
}
</style>

<!-- Kod untuk butang mengubah saiz tulisan -->
<p style="font-family:Century Gothic;"><input  name='cetak' type='button' value='CETAK' onclick="window.print()" /><br><br>[| Ubah Saiz Tulisan (
<input  name='reSize'  type='button'   value='&nbsp;+&nbsp;'  onclick="ubahsaiz(1)" />
<input  name='reSize1' type='button'   value='RESET'          onclick="ubahsaiz(2)" />
<input  name='reSize2' type='button'   value='&nbsp;-&nbsp;'  onclick="ubahsaiz(-1)" />
) |]
</p>