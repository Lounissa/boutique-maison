

  const addAdresseFormDeleteLink = (item) => {
    const removeFormButton = document.createElement('button');
    removeFormButton.classList.add("btn", "text-danger", "bt-trash", "align-self-baseline");
    removeFormButton.innerHTML = '<i class="align-middle" data-feather="trash-2">';
  

  item.append(removeFormButton);

  removeFormButton.addEventListener('click', (e) => {
      e.preventDefault();
      // remove the li for the tag form
      // On supprime la li parent du bouton
      item.parentElement.remove();
      // item.remove();
  });
  }


const addFormToCollection = (e) => {
  // On récupère l'ul qui contient la collection de formulaires dynamiques
  const collectionHolder = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);
  // On crée un li, qui contiendra le prototype du formulaire
  const item = document.createElement('li');
  // On ajouter dans l'html de la li l'html du prototype de formulaire des images contenu dans l'attribut data-prototype
  // de l'ul.
  // On remplace les __name__ par le numéro de l'index de la collection (l'attribut data-index de l'ul)
  item.innerHTML = collectionHolder
      .dataset
      .prototype
      .replace(
          /__name__/g,
          collectionHolder.dataset.index
      );
  // On ajoute un bouton de suppression
  const container = item.querySelector('.item-form-container');
  

  addAdresseFormDeleteLink(container);

  // On récupère l'input de type type file dans la li afin d'initialiser son écouteur d'evenement
  // const input = item.querySelector('.select-item');

  // On active l'écouteur d'évènement sur l'input

  

  // activateSelectAdresse(input);

  // On ajoute la li au ul
  collectionHolder.appendChild(item);
  // On active feather pour remplace les balises i par les icones svg
  feather.replace();
  // On incrémente l'index de la collection (attribut data-index de l'ul)
  collectionHolder.dataset.index++;
};
// Prise en charge du clic sur le bouton d'ajout d'une image


  document
  .querySelectorAll('.add_item_link')
  .forEach(btn => {
      btn.addEventListener("click", addFormToCollection)
  });
// Mise en place des boutons de suppression
document
  .querySelectorAll('ul.item .item-form-container')
  .forEach((item) => {
      addAdresseFormDeleteLink(item);
  });

