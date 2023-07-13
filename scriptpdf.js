function generatePDF(){
    const element = document.documentElement;
    html2pdf()
    .from(element)
    .save();
}