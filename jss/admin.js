const subcategories = {
  ophthalmologists: ['Glaucoma', 'Neuro-ophthalmology', 'Oculoplastics'],
  oncologists: ['Surgical', 'Medical ', 'Radial'],
  neurologists: ['Clinical', 'Vascular ', 'Child '],
  paediatricians: ['Gastroenterology', 'Genetics ', 'Pulmonology ']
};

function updateSubcategories() {
  const mainCategory = document.getElementById('specialization').value;
  const subcategorySelect = document.getElementById('sub-specialization');
  
  // Clear existing options
  subcategorySelect.innerHTML = '<option value="">Select a subcategory</option>';

  // Add new options based on the selected main category
  if (mainCategory) {
      subcategories[mainCategory].forEach(subcategory => {
          const option = document.createElement('option');
          option.value = subcategory.toLowerCase();
          option.textContent = subcategory;
          subcategorySelect.appendChild(option);
      });
  }
}