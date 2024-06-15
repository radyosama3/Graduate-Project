function printSelectedQuestions() {
    const selectedQuestions = document.querySelectorAll('input[type="checkbox"]:checked');
    let selectedQuestionsHTML = '<h2>Selected Questions</h2>';
    if (selectedQuestions.length === 0) {
      selectedQuestionsHTML += '<p>No questions selected.</p>';
    } else {
      selectedQuestionsHTML += '<ul>';
      selectedQuestions.forEach(question => {
        selectedQuestionsHTML += `<li>${question.value}</li>`;
      });
      selectedQuestionsHTML += '</ul>';
    }
    const printWindow = window.open('', '_blank');
    printWindow.document.write('<html><head><title>Selected Questions</title></head><body>');
    printWindow.document.write(selectedQuestionsHTML);
    printWindow.document.write('<style>body {font-family: Arial, sans-serif;}</style>');
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
  }