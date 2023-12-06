<?php
require_once 'Views/WebsiteAdminView.php';

session_start();
if (isset($_SESSION['Email'])) {
    $websiteAdminView = new WebsiteAdminView();
    $websiteAdminView->buildDashboard();

} else {
    $websiteAdminView = new WebsiteAdminView();
    $websiteAdminView->buildLogin();
}
