"use strict";

const init = function () {
  const bodyContainer = document.querySelector(".body_container");
  const dashboardBody = bodyContainer?.querySelector(".dashboard_body");
  if (dashboardBody) {
    $.ajax({
      url: "endpoints.php",
      type: "GET",
      data: {
        view: "VehiculesMarquesView.php",
      },
      success: function (data) {
        console.log("Chargement réussi:", data);
        dashboardBody.innerHTML = data;
      },
      error: function (error) {
        console.error("Erreur de chargement:", error);
      },
    });
  }
};

const switchBetweenViews = function () {
  const menuButtons = document.getElementsByClassName("menu_item");

  [...menuButtons].forEach((button) => {
    button.addEventListener("click", () => {
      [...menuButtons].forEach((button) => {
        button.children[0].style.backgroundColor = "white";
        button.children[0].style.color = "#c3d4e9";
      });
      button.children[0].style.backgroundColor = "#3563e9";
      button.children[0].style.color = "white";
    });
  });
};

const injectView = function () {
  const bodyContainer = document.querySelector(".body_container");
  const dashboardBody = bodyContainer?.querySelector(".dashboard_body");
  if (dashboardBody) {
    const menuItems = document.querySelectorAll(".menu_item_link");
    menuItems.forEach((menuItem) => {
      menuItem.addEventListener("click", (event) => {
        event.preventDefault();
        const target = event.currentTarget.dataset.target;
        $.ajax({
          url: "endpoints.php",
          type: "GET",
          data: {
            view: target,
          },
          success: function (data) {
            dashboardBody.innerHTML = data;
          },
          error: function (error) {
            console.error("Erreur de chargement:", error);
          },
        });
      });
    });
  }
};

const logout = function () {
  const logoutButton = document?.querySelector(".deconnexion_btn");
  if (logoutButton) {
    logoutButton.addEventListener("click", () => {
      console.log("logout");
      $.ajax({
        url: "endpoints.php",
        type: "GET",
        data: {
          logout: "logout",
        },
        success: function () {},
        error: function (error) {
          console.error("Erreur de chargement:", error);
        },
      });
    });
  }
};

init();
switchBetweenViews();
injectView();
logout();
