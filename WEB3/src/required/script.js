$(document).ready(function () {
  var aukeraHizkuntzaSelect = $("#selectHizkuntzaAukeratzeko").val();
  //LOG IN /////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////

  // Ocultar el formulario de login al principio
  $(".login").hide();
  $(".register_li").addClass("active");

  // Ezizena berifikatzeko funtzioa
  function validateUsername(username) {
    var regex = /^[^0-9][A-Za-z0-9_]{2,}$/;
    return regex.test(username);
  }

  // Emaila berifikatzeko funtzioa
  function validateEmail(email) {
    var regex = /^[A-Za-z._-]+(@gmail|@goierrieskola|@hotmail)\.(com|eus|org)$/;
    return regex.test(email);
  }

  // Kontraseña berifikatzeko funtzioa
  function validatePassword(password) {
    // Al menos 8 caracteres, una mayúscula, una minúscula y un número
    var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
    return regex.test(password);
  }

  // Verificar los datos al escribir en los campos de entrada
  $(".input").on("input", function () {
    var input = $(this);
    var inputValue = input.val();

    switch (input.attr("id")) {
      case "ezizena":
        if (validateUsername(inputValue)) {
          input.css("border-color", "green");
        } else {
          input.css("border-color", "red");
        }
        break;
      case "emailaRegist":
        if (validateEmail(inputValue)) {
          input.css("border-color", "green");
        } else {
          input.css("border-color", "red");
        }
        break;
      case "emailaLog":
        if (validateEmail(inputValue)) {
          input.css("border-color", "green");
        } else {
          input.css("border-color", "red");
        }
        break;
      case "pasahitzRegist":
        if (validatePassword(inputValue)) {
          input.css("border-color", "green");
        } else {
          input.css("border-color", "red");
        }
        break;
      case "pasahitzaLog":
        if (validatePassword(inputValue)) {
          input.css("border-color", "green");
        } else {
          input.css("border-color", "red");
        }
        break;
      default:
        break;
    }
  });

  $(".login_li").click(function () {
    $(this).addClass("active");
    $(".register_li").removeClass("active");
    $(".register").fadeOut("fast", function () {
      $(".login").fadeIn("fast");
    });
  });

  $(".register_li").click(function () {
    $(this).addClass("active");
    $(".login_li").removeClass("active");
    $(".login").fadeOut("fast", function () {
      $(".register").fadeIn("fast");
    });
  });

  //LOG IN ////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //Bilatzailea ////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////

  document
    .getElementById("search-button")
    .addEventListener("click", function (e) {
      e.preventDefault();
      var searchTerm = document.getElementById("search-input").value;
      searchProducts(searchTerm);
    });

  function searchProducts(term) {
    var found = window.find(term, false, false, true, false, true, false);
    if (!found) {
      var aukeraHizkuntzaSelect = $("#selectHizkuntzaAukeratzeko").val();
      switch (aukeraHizkuntzaSelect) {
        case "eus": {
          alert("Ez da aurkitu bilatutakoa.");
          break;
        }
        case "es": {
          alert("No se encontraron coincidencias.");
          break;
        }
        case "en": {
          alert("No matches found.");
          break;
        }
      }
    }
  }

  //Bilatzailea ////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //ERREGISTRATU ////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////

  $(".btnRegist").click(function (event) {
    event.preventDefault(); // Evitar que el enlace o botón actúe como un enlace estándar o botón de envío

    // Verificar si los bordes de los elementos de entrada son verdes
    var greenBorders = true;
    $(".register .input_field input").each(function () {
      if ($(this).css("border-color") !== "rgb(0, 128, 0)") {
        greenBorders = false;
        return false; // Salir del bucle each si se encuentra un borde que no es verde
      }
    });

    // Si los bordes son verdes, continuar con la operación AJAX
    if (greenBorders) {
      var namevalue = $("#ezizena").val();
      var emailValue = $("#emailaRegist").val();
      var passwordValue = $("#pasahitzRegist").val();

      $.ajax({
        type: "POST",
        url: "../../required/ajaxDeiak.php",
        data: {
          action: "registratu",

          ezizena: namevalue,
          email: emailValue,
          pasahitza: passwordValue,
        },
        success: function (response) {
          // Aquí puedes manejar la respuesta del servidor si es necesaria
          console.log(response);
        },
      }).done(function (data) {
        location.reload();
        var aukeraHizkuntzaSelect = $("#selectHizkuntzaAukeratzeko").val();
        switch (aukeraHizkuntzaSelect) {
          case "eus": {
            alert("Email edo ezizen horrekin iada existitzen da kontu bat.");
            break;
          }
          case "es": {
            alert("Ya existe una cuenta con ese email.");
            break;
          }
          case "en": {
            alert("An account with that email already exists.");
            break;
          }
        }
      });
    } else {
      // Si los bordes no son verdes, muestra un mensaje de error o realiza alguna otra acción
      var aukeraHizkuntzaSelect = $("#selectHizkuntzaAukeratzeko").val();
      switch (aukeraHizkuntzaSelect) {
        case "eus": {
          alert("Sartu datuak zuzen.");
          break;
        }
        case "es": {
          alert("Mete los datos correctamente.");
          break;
        }
        case "en": {
          alert("Insert the data correctly.");
          break;
        }
      }
    }
  });
  //ERREGISTRATU ///////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //log in /////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////
  $(".btnLogIn").click(function () {
    event.preventDefault(); // Evitar que el enlace o botón actúe como un enlace estándar o botón de envío

    // Verificar si los bordes de los elementos de entrada son verdes
    var greenBorders = true;
    $(".login .input_field input").each(function () {
      if ($(this).css("border-color") !== "rgb(0, 128, 0)") {
        greenBorders = false;
        return false; // Salir del bucle each si se encuentra un borde que no es verde
      }
    });

    // Si los bordes son verdes, continuar con la operación AJAX
    if (greenBorders) {
      var emailValue = $("#emailaLog").val();
      var passwordValue = $("#pasahitzaLog").val();

      $.ajax({
        type: "POST",
        url: "../../required/ajaxDeiak.php",
        data: {
          action: "logeatu",

          email: emailValue,
          pasahitza: passwordValue,
        },
        success: function (response) {
          // Aquí puedes manejar la respuesta del servidor si es necesaria
          console.log(response);
        },
      }).done(function (data) {
        var aukeraHizkuntzaSelect = $("#selectHizkuntzaAukeratzeko").val();
        switch (aukeraHizkuntzaSelect) {
          case "eus": {
            if (data == "ban") {
              alert("Kontu hau baneatuta dago.");
            } else if (data == "noCorrect") {
              alert("Datuak ez dira zuzenak.");
            }

            break;
          }
          case "es": {
            if (data == "ban") {
              alert("Esta cuenta esta baneada.");
            } else if (data == "noCorrect") {
              alert("Los datos no son correctos.");
            }

            break;
          }
          case "en": {
            if (data == "ban") {
              alert("This account is banned.");
            } else if (data == "noCorrect") {
              alert("Enter the data correctly.");
            }

            break;
          }
        }

        location.reload();
      });
    } else {
      // Si los bordes no son verdes, muestra un mensaje de error o realiza alguna otra acción
      var aukeraHizkuntzaSelect = $("#selectHizkuntzaAukeratzeko").val();
        switch (aukeraHizkuntzaSelect) {
          case "eus": {
            alert("Ez dago konturik datu horiekin.");
            break;
          }
          case "es": {
            alert("No existe una cuenta con esos datos.");
            break;
          }
          case "en": {
            alert("No account found.");
            break;
          }
        }
    }
  });
  //log in ////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //Log OUT /////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////

  $(".logOutBtn").click(function () {
    $.ajax({
      type: "POST",
      url: "../../required/ajaxDeiak.php",
      data: {
        action: "logOut",
      },
      success: function (response) {
        console.log(response);
      },
    }).done(function (data) {
      if (data != "no") {
        location.reload();
      }
    });
  });

  //Log OUT ////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //JokalariakDiruaSwith /////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////

  var visibleSection = localStorage.getItem("visibleSection1");

  if (visibleSection === "jokalariak") {
    $(".containerJokalariakOsoa").show();
    $(".containerDiruaOsoa").hide();
    $(".diruaAgertzeko2").hide();
  } else {
    $(".containerJokalariakOsoa").hide();
    $(".containerDiruaOsoa").show();
    $(".diruaAgertzeko2").show();
  }

  $("#Dirua").click(function () {
    $(".containerJokalariakOsoa").hide();
    $(".containerDiruaOsoa").show();
    $(".diruaAgertzeko2").show();
    localStorage.setItem("visibleSection1", "sobreak");
  });
  $("#Jokalariak").click(function () {
    $(".containerJokalariakOsoa").show();
    $(".containerDiruaOsoa").hide();
    $(".diruaAgertzeko2").hide();
    localStorage.setItem("visibleSection1", "jokalariak");
  });

  //JokalariakDiruaSwith ////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //Jokalaria erosi /////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////

  $(".erosiJokalaria").click(function () {
    var botoianId = $(this).attr("id");

    var idZenbakia = botoianId.substring("erosiJokalaria".length);

    $.ajax({
      type: "POST",
      url: "../../required/ajaxDeiak.php",
      data: {
        action: "JokalariaErosi",
        idZenbakia: idZenbakia,
      },
      success: function (response) {
        console.log(response);
      },
    }).done(function (data) {
      alert(data);
      if (data == "Erregistroa zuzen egin da!") {
        location.reload();
      }
    });
  });

  //Jokalaria erosi ////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //Sobrea erosi /////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////

  $(".sobreErosiBtn").click(function () {
    var botoianId = $(this).attr("id");

    var idZenbakia = botoianId.substring("sobreErosiBtn".length);

    $.ajax({
      type: "POST",
      url: "../../required/ajaxDeiak.php",
      data: {
        action: "sobreaErosi",
        idZenbakia: idZenbakia,
      },
      success: function (response) {
        console.log(response);
      },
    }).done(function (data) {
      if(data=="ezDirua"){
        var aukeraHizkuntzaSelect = $("#selectHizkuntzaAukeratzeko").val();
        switch (aukeraHizkuntzaSelect) {
          case "eus": {
            alert("Ezdaukazu diru nahikoa.");
            break;
          }
          case "es": {
            alert("No tienes suficiente dinero.");
            break;
          }
          case "en": {
            alert("You dont have enough money.");
            break;
          }
        }
      }
      location.reload();
    });
  });

  //Sobrea erosi ////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //PLANTILLAA//////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////
  var visibleSection = localStorage.getItem("visibleSection");

  if (visibleSection === "plantilla") {
    $(".plantillaContainer").show();
    $(".jokokoaContainer").hide();

    resetBorders();
    $(".PlantillaErakutsi").addClass("brilliant-border");
  } else {
    $(".plantillaContainer").hide();
    $(".jokokoaContainer").show();

    resetBorders();
    $(".JokokoaErakutsi").addClass("brilliant-border");
  }

  function resetBorders() {
    $(".JokokoaErakutsi, .PlantillaErakutsi").removeClass("brilliant-border");
  }

  $(".JokokoaErakutsi").click(function () {
    $(".plantillaContainer").hide();
    $(".jokokoaContainer").show();
    localStorage.setItem("visibleSection", "jokokoa");

    resetBorders();
    $(this).addClass("brilliant-border");
  });

  $(".PlantillaErakutsi").click(function () {
    $(".plantillaContainer").show();
    $(".jokokoaContainer").hide();
    localStorage.setItem("visibleSection", "plantilla");

    resetBorders();
    $(this).addClass("brilliant-border");
  });

  //PLANTILLAA ////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////

  //JOKALARIAK LEKUZ MOITZEKO//////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////

  $(".jokoraEmanBtn").click(function () {
    var jokalariKop = $("#jokalariKop").val();
    if (jokalariKop >= 11) {
      alert("Jokalari kopurua beteta dago");
    } else {
      var botoianId = $(this).attr("id");
      $.ajax({
        type: "POST",
        url: "../../required/ajaxDeiak.php",
        data: {
          action: "jokoraEman",
          botoianId: botoianId,
        },
        success: function (response) {
          console.log(response);
        },
      }).done(function (data) {
        if (!(data == "")) {
          alert(data);
        }

        location.reload();
      });
    }
  });

  $(".plantilaraEmanBtn").click(function () {
    var botoianId = $(this).attr("id");

    $.ajax({
      type: "POST",
      url: "../../required/ajaxDeiak.php",
      data: {
        action: "plantilaraEman",
        botoianId: botoianId,
      },
      success: function (response) {
        console.log(response);
      },
    }).done(function (data) {
      if (!(data == "")) {
        alert(data);
      }

      location.reload();
    });
  });

  //JOKALARIAK LEKUZ MOITZEKO ////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////

  //PARTIDA JOLASTERA JOATEKO LOGIKA//////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////

  var jokalariKop = $("#jokalariKop").val();
  if (jokalariKop == 11) {
    $(".partidaJolastu").addClass("partidaJolastuDesblok");
  }

  $(".partidaJolastuDesblok").click(function () {
    var taldearenMedia = $("#taldearenMedia").val();
    $.ajax({
      type: "POST",
      url: "../../required/ajaxDeiak.php",
      data: {
        action: "sessionenSartu",
        taldearenMedia: taldearenMedia,
      },
    }).done(function (data) {});

    window.location.href = "../partidaJolastu/partidaJolastu.php";
  });

  //PARTIDA JOLASTERA JOATEKO LOGIKA//////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //PARTIDA JOLASTERA JOATEKO LOGIKA//////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////

  $(".zailtasunak").click(function () {
    var aukeraid = $(this).attr("id");
    var apostua = 0;
    switch (aukeraid) {
      case "7582":
        var apostua = 500;
        break;
      case "8389":
        var apostua = 1000;
        break;
      case "9098":
        var apostua = 2000;
        break;
    }
    var primeraMitad = aukeraid.substring(0, aukeraid.length / 2);
    var segundaMitad = aukeraid.substring(aukeraid.length / 2);

    var taldearenMedia = $("#taldearenMedia").val();
    var taldearenDirua = $("#taldearenDirua").val();

    $.ajax({
      type: "POST",
      url: "../../required/ajaxDeiak.php",
      data: {
        action: "jolastu",
        apostua: apostua,
        primeraMitad: primeraMitad,
        segundaMitad: segundaMitad,
        taldearenMedia: taldearenMedia,
        taldearenDirua: taldearenDirua,
      },
      success: function (response) {
        console.log(response);
      },
    }).done(function (data) {
      if(data=="ezDirua"){
        var aukeraHizkuntzaSelect = $("#selectHizkuntzaAukeratzeko").val();
        switch (aukeraHizkuntzaSelect) {
          case "eus": {
            alert("Ezdaukazu diru nahikoa.");
            break;
          }
          case "es": {
            alert("No tienes suficiente dinero.");
            break;
          }
          case "en": {
            alert("You dont have enough money.");
            break;
          }
        }
      }else{
        alert(data);
      }

      location.reload();
    });
  });

  //PARTIDA JOLASTERA JOATEKO LOGIKA ////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////

  /////////////////////////////////////////////////////////////////////////////////////////////
  //TESTAREN LOGIkA ////////////////////////////////////////////////////////////////

  $(".answer-checkbox").click(function () {
    var group = $(this).data("group");
    var correctAnswer = $(this).data("correct-answer");
    if ($(this).prop("checked")) {
      $('.answer-checkbox[data-group="' + group + '"]')
        .not(this)
        .prop("disabled", true);
    } else {
      $('.answer-checkbox[data-group="' + group + '"]').prop("disabled", false);
    }
    // Comprobar si la respuesta seleccionada es correcta
    if ($(this).val() === correctAnswer && $(this).prop("checked")) {
      $('.answer-checkbox[data-group="' + group + '"]')
        .not(this)
        .prop("checked", false);
    }
  });

  $(".testBidali").click(function (e) {
    var correctCount = 0;
    $(".answers").each(function () {
      var $checkedCheckbox = $(this).find(".answer-checkbox:checked");
      if ($checkedCheckbox.length > 0) {
        var selectedAnswer = $checkedCheckbox.val();
        var correctAnswer = $checkedCheckbox.data("correct-answer");
        if (selectedAnswer === correctAnswer) {
          correctCount++;
        }
      }
    });
    alert("👍" + correctCount);
    if (correctCount == 1) {
      alert("+100€ ");
    } else if (correctCount == 2) {
      alert("+200€ ");
    } else if (correctCount == 3) {
      alert("+300€ ");
    }

    // Calcular el dinero ganado
    var dineroGanado;
    if (correctCount == 1) {
      dineroGanado = 100;
    } else if (correctCount == 2) {
      dineroGanado = 200;
    } else if (correctCount == 3) {
      dineroGanado = 300;
    } else {
      dineroGanado = 0; // No hay respuestas correctas, por lo tanto, no hay dinero ganado
    }
    $.ajax({
      type: "POST",
      url: "../../required/ajaxDeiak.php",
      data: {
        action: "diruaGehitu",
        dineroGanado: dineroGanado,
      },
      success: function (response) {
        console.log(response);
      },
    }).done(function (data) {
      if (!(data == "")) {
        alert(data);
      }

      location.reload();
    });
    // Realizar la solicitud AJAX para enviar el dinero ganado al servidor
  });
});
