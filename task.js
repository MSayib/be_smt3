/**
 * Fungsi untuk menampilkan hasil download
 * @param {string} result - Nama file yang didownload
 */
const showDownload = (result) => {
    console.log("Download selesai");
    return `Hasil Download: ${result}`;
}

/**
 * Fungsi untuk download file
 * @param {function} callback - Function callback show
 */
const download = (callShowDownload) => {
    const myPromise = new Promise(function (resolve, reject) {
        cek = true;
        if (cek) {
            setTimeout(function () {
                const result = "windows-10.exe";
                resolve(callShowDownload(result));
            }, 3000);
        } else {
            reject("Download gagal");
        }
    });
    return myPromise;
}

download(showDownload).then((result) => console.log(result)).catch((error) => console.log(error));

/**
 * TODO:
 * - Refactor callback ke Promise atau Async Await
 * - Refactor function ke ES6 Arrow Function
 * - Refactor string ke ES6 Template Literals
 */