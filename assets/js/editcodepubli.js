function refreshpub() {
  const cdepub_html = document.getElementById("myCopy1").value;
  const cdepub_css =
    "<style>" + document.getElementById("myCopy2").value + "</style>";
  const cdepub_js =
    "<scri" +
    "pt>" +
    document.getElementById("myCopy3").value +
    "</scri" +
    "pt>";
  const page = document.getElementById("res2").contentWindow.document;
  page.open();
  page.write(cdepub_html + cdepub_css + cdepub_js);
  page.close();
}
