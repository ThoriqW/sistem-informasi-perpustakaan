  // Tanggal navbar 

  const weekday = ["Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu"];

  const date = new Date()

  day = weekday[date.getDay()]

  const today = day + "/" + date.getMonth() + "/" + date.getFullYear()

  let dateNavbar = document.querySelector(".tanggal-navbar")

  dateNavbar.innerHTML = today