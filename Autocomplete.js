document.addEventListener('DOMContentLoaded', function() {

    const homeLink = document.getElementById('home-link');
    const exploreLink = document.getElementById('explore-link');
    const postsLink = document.getElementById('posts-link');
    const statisticsLink = document.getElementById('statistics-link');
    const profileLink = document.getElementById('profile-link');
    const signupLink = document.getElementById('signup-link');
    const loginLink = document.getElementById('login-link');
    const privateTabs = document.querySelectorAll("[requires-auth]");
    const guestElements = document.querySelectorAll("[guest]");

    function redirectTo(pageUrl) {
      window.location.href = pageUrl;
    }     

  homeLink.addEventListener('click', function() {
    redirectTo('Homepage.html'); // Shko ne Homepage
  });

  exploreLink.addEventListener('click', function() {
    redirectTo('Explore.html'); // Shko te Explore
  })

  postsLink.addEventListener('click', function() {
    redirectTo('MyPosts.html'); // Shko ne My Posts
  });

  statisticsLink.addEventListener('click', function() {
    redirectTo('Statistics.html'); // Shko ne Statistics
  });

  profileLink.addEventListener('click', function() {
    redirectTo('Profile.html'); // Shko ne Profile
  });

  signupLink.addEventListener('click', function() {
    redirectTo('SignUp.html'); // Shko ne Sign Up
  });

  loginLink.addEventListener('click', function() {
    redirectTo('Login2.html'); // Shko ne Login
  });

const togglePrivateTabsVisibility = (isVisible) => {
  if (isVisible)
    privateTabs.forEach((tab) => {
      tab.classList.remove("hidden");
    });
  else
    privateTabs.forEach((tab) => {
      tab.classList.add("hidden");
    });
};

const toggleGuestElementsVisibility = (isVisible) => {
  console.log('comes here!!')
  console.log('isVisible', isVisible)
  console.log('guestElements: ', guestElements)
  if (isVisible)
    guestElements.forEach((tab) => {
      tab.classList.remove("hidden");
    });
  else
    guestElements.forEach((tab) => {
      tab.classList.add("hidden");
    });
};

const isLoggedIn = localStorage.getItem('isLoggedIn')
  if(isLoggedIn){
    togglePrivateTabsVisibility(true)
    toggleGuestElementsVisibility(false)
  }

  });

let availableKeywords = [
    'Personal Development and Wellnes',
    'Lifestyle and Family',
    'Travel',
    'Food and Drink',
    'Fashion and Beauty',
    'Technology and Gadgets',
    'Finance and Business',
    'Education and Learning',
];

const resultsBox = document.querySelector(".result-box");
const inputBox = document.getElementById("input-box");

inputBox.onkeyup = function(){
    let result = [];
    let input = inputBox.value;
    if(input.length){
        result = availableKeywords.filter((keyword)=>{
            return keyword.toLowerCase().includes(input.toLowerCase());
        });
        console.log(result);
    }
    display(result);

    if(!result.length){
        resultsBox.innerHTML = '';
    }
}

    function display(result){
        const content = result.map((list)=>{
            return "<li onclick=selectInput(this)>" + list + "</li>";
        });

        resultsBox.innerHTML = "<ul>" + content.join('') + "</ul>";
    }
    function selectInput(list){
        inputBox.value = list.innerHTML;
        resultsBox.innerHTML = '';
    }