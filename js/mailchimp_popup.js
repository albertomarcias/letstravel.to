function showMailingPopUp() {
  require(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us9.list-manage.com","uuid":"4e7442bf82c653f9b9066385f","lid":"f54f43493a"}) })
  document.cookie = "MCPopupClosed=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
};

document.getElementById("open-popup").onclick = function() {
  showMailingPopUp();
};