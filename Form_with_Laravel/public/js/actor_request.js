// Add an event listener to the birthdate input field
const getActorsButton = document.getElementById("get-actors-button");
  getActorsButton.addEventListener("click", function () {
  const birthdateInput = document.getElementById("birthdate");
  const date = birthdateInput.value;
  // extract the month and day from the date
  const month = date.substring(5, 7);
  const day = date.substring(8, 10);

  // Fetch actors born on the given date
  fetch(`/actors/bio?month=${month}&day=${day}`)
    .then(response => response.json())
    .then(data => {
      const actors = data.actors;

      // create a container for the actor names
      const actorContainer = document.createElement("div");

      for (let i = 0; i < actors.length; i++) {
        // create a div for each actor
        const actorDetailsDiv = document.createElement("div");
        const actorName = document.createElement("p");
        actorName.textContent = "Name of actor " + (i + 1) + ": " + actors[i].name;
        // create a paragraph element for the actor's birthdate
        const actorBirthdate = document.createElement("p");
        actorBirthdate.textContent = "Birthdate of actor " + (i + 1) + ": " + actors[i].birthDate;
        //create a paragraph element for the actor's birthplace
        const actorBirthplace = document.createElement("p");
        actorBirthplace.textContent = "Birthplace of actor  " + (i + 1) + ": " + actors[i].birthPlace;

        actorDetailsDiv.appendChild(actorName);
        actorDetailsDiv.appendChild(actorBirthdate);
        actorDetailsDiv.appendChild(actorBirthplace);
        actorContainer.appendChild(actorDetailsDiv);
      }

      // append the actor container to the page
      const container = document.getElementById("container");
      container.appendChild(actorContainer);
    })
    .catch(error => console.log(error));
});