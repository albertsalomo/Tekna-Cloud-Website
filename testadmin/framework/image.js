bookImage.onchange = evt => {
    const [file] = bookImage.files
    if (file) {
        output.src = URL.createObjectURL(file)
    }
}