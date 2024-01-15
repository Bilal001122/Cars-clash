function showDiaporama() {
  if (document.querySelector(".diaporama") != null) {
    let slides = document.querySelectorAll(".diaporama");
    let currentSlide = 0;
    const slideInterval = 5000;

    function nextSlide() {
      slides[currentSlide].style.display = "none";
      currentSlide = (currentSlide + 1) % slides.length;
      slides[currentSlide].style.display = "block";
    }

    function startSlideshow() {
      slides[currentSlide].style.display = "block";
      setInterval(nextSlide, slideInterval);
    }
    slides.forEach((slide) =>
      slide.addEventListener("click", function (event) {
        window.open(
          slides[currentSlide].firstElementChild.dataset.pointer,
          "_blank"
        );
        console.log(slides[currentSlide].firstChild);
      })
    );
    window.onload = startSlideshow();
  }
}

showDiaporama();

var selectedMarque1, selectedMarque2, selectedMarque3, selectedMarque4;
console.log(selectedMarque1);

var selectedModele1, selectedModele2, selectedModele3, selectedModele4;

var selectedVersion1, selectedVersion2, selectedVersion3, selectedVersion4;

function getOptionsMarque(numeroVoiture, selectedMarque) {
  $.ajax({
    type: "POST",
    url: "/cars-clash/client/api.php",
    data: { marque: selectedMarque },
    success: function (response) {
      console.log(response);
      const models = JSON.parse(response);
      const modeleField = $(`#modele_${numeroVoiture}`);
      modeleField.empty();
      models.forEach(function (modele) {
        modeleField.append(
          $("<option>", {
            value: modele,
            text: modele,
          })
        );
      });
      selectedModele = models[0];
      modeleField.val(selectedModele).change();
    },
    error: function (xhr, status, error) {
      console.log("failed to get options");
    },
  });
}

function getOptionsModele(numeroVoiture, selectedMarque, selectedModele) {
  $.ajax({
    type: "POST",
    url: "/cars-clash/client/api.php",
    data: { modele: selectedModele, marque: selectedMarque },
    success: function (response) {
      const versions = JSON.parse(response);
      const versionField = $(`#version_${numeroVoiture}`);
      versionField.empty();
      versions.forEach(function (version) {
        versionField.append(
          $("<option>", {
            value: version,
            text: version,
          })
        );
      });
      selectedVersion = versions[0];
      versionField.val(selectedVersion).change();
    },
    error: function (xhr, status, error) {
      console.log("failed to get options");
    },
  });
}

function getOptionsVersion(
  numeroVoiture,
  selectedMarque,
  selectedModele,
  selectedVersion
) {
  $.ajax({
    type: "POST",
    url: "/cars-clash/client/api.php",
    data: {
      version: selectedVersion,
      modele: selectedModele,
      marque: selectedMarque,
    },
    success: function (response) {
      console.log("success");
      const annees = JSON.parse(response);
      const anneeField = $(`#annee_${numeroVoiture}`);
      anneeField.empty();
      annees.forEach(function (annee) {
        anneeField.append(
          $("<option>", {
            value: annee,
            text: annee,
          })
        );
      });
      selectedAnnee = annees[0];
      anneeField.val(selectedAnnee).change();
    },
    error: function (xhr, status, error) {
      console.log("failed to get options");
    },
  });
}

$("#marque_1").click(function () {
  selectedMarque1 = $(this).val();
  console.log(selectedMarque1);
  getOptionsMarque(1, selectedMarque1);
});

$("#marque_2").click(function () {
  selectedMarque2 = $(this).val();
  getOptionsMarque(2, selectedMarque2);
});

$("#marque_3").click(function () {
  selectedMarque3 = $(this).val();
  getOptionsMarque(3, selectedMarque3);
});

$("#marque_4").click(function () {
  selectedMarque4 = $(this).val();
  getOptionsMarque(4, selectedMarque4);
});

$("#modele_1").change(function () {
  selectedModele1 = $(this).val();
  getOptionsModele(1, selectedMarque1, selectedModele1);
});

$("#modele_2").change(function () {
  selectedModele2 = $(this).val();
  getOptionsModele(2, selectedMarque2, selectedModele2);
});

$("#modele_3").change(function () {
  selectedModele3 = $(this).val();
  getOptionsModele(3, selectedMarque3, selectedModele3);
});

$("#modele_4").change(function () {
  selectedModele4 = $(this).val();
  getOptionsModele(4, selectedMarque4, selectedModele4);
});

$("#version_1").change(function () {
  selectedVersion1 = $(this).val();
  getOptionsVersion(1, selectedMarque1, selectedModele1, selectedVersion1);
});

$("#version_2").change(function () {
  selectedVersion2 = $(this).val();
  getOptionsVersion(2, selectedMarque2, selectedModele2, selectedVersion2);
});

$("#version_3").change(function () {
  selectedVersion3 = $(this).val();
  getOptionsVersion(3, selectedMarque3, selectedModele3, selectedVersion3);
});

$("#version_4").change(function () {
  selectedVersion4 = $(this).val();
  getOptionsVersion(4, selectedMarque4, selectedModele4, selectedVersion4);
});
