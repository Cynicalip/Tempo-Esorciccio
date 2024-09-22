function ciccio() {
  let hours = parseInt(document.getElementById("hours").value, 10) || 0;
  let minutes = parseInt(document.getElementById("min").value, 10) || 0;
  let mess = "";

  if (hours <= 0 && minutes <= 0) {
    mess = "Inserisci almeno un valore.";
  } else {
    mess = `${hours > 0 ? hours + (hours === 1 ? " ora" : " ore") : ""} ${
      hours > 0 && minutes > 0 ? "e " : ""
    }${
      minutes > 0 ? minutes + (minutes === 1 ? " minuto" : " minuti") : ""
    }${
		((hours===1) ? ((minutes===1) ? " equivalgono a " : " equivale a ") : 
		((minutes===1) ? " equivale a " : " equivalgono a "))} 
	`;

    const Ciccio = 90;
    minutes += hours * 60;
    const gcd = MCD(minutes, Ciccio);

    if (gcd === 1) {
      mess += `${minutes}/${Ciccio} di Esorciccio.`;
    } else if (minutes % Ciccio === 0) {
      const intCiccio = minutes / Ciccio;
      mess += `${intCiccio} ${intCiccio === 1 ? "Esorciccio" : "Esorcicci"}.`;
    } else {
      mess += `${minutes / gcd}/${Ciccio / gcd} di Esorciccio.`;
    }
  }
  document.getElementById("containerTEXT").innerHTML = mess;
}

function MCD(n1, n2) {
  let divisore = 1;
  for (let i = 1; i <= n1; i++) {
    if (n1 % i === 0 && n2 % i === 0) {
      divisore = i;
    }
  }
  return divisore;
}
