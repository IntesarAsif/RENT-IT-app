let isLoggedIn = false;

async function checkSession() {
  try {
    const response = await fetch('session_status.php');
    const data = await response.json();
    isLoggedIn = data;
    if (isProtectedPage()) {
      checkLoggedIn();
    }
  } catch (error) {
    console.error('Error checking session status:', error);
  }
}

function checkLoggedIn() {
  if (!isLoggedIn) {
    window.location.href = "Login.html";
  }
}

function isProtectedPage() {
  const protectedPages = [
    "addapartment.html",
    "ownerprofile.html",
    "ownerprofile2.html",
    "payment.html",
    "rentalapplicationform.html",
  ];
  const currentPage = window.location.pathname.split("/").pop();
  return protectedPages.includes(currentPage);
}

// Call checkSession() on page load
checkSession();
