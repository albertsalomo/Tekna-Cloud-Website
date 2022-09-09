contentImage.onchange = evt => {
    const [file] = contentImage.files
    if (file) {
        output.src = URL.createObjectURL(file)
    }
}