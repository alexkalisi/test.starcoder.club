;(async () => {
  const response = await axios.get('/wp-content/themes/omega/load_posts.php');
  document.querySelector("#posts_wrapper").innerHTML = response.data;
})()