const axios = require('axios');
const cheerio = require('cheerio');

const mysql = require('mysql2/promise');
let connection;
async function connectMysql() {
  connection = await mysql.createConnection({
    host: 'localhost',
    port: 3307,
    user: 'root', // Tên người dùng của MySQL
    password: '', // Mật khẩu của MySQL
    database: 'laptop_shop' // Tên cơ sở dữ liệu bạn muốn thao tác
  });
}
// function connectMysql() {
//   connection.connect(function (error) {
//     if (error) {
//       console.error('Lỗi kết nối:', error.stack);
//     } else {
//       console.log('Kết nối thành công. ' + connection.threadId);
//     }
//   });
// }
// function closeMysql() {
//   connection.end(function (error) {
//     if (error) {
//       console.error('Lỗi khi đóng kết nối:', error.stack);
//     } else {
//       console.log('Đã đóng kết nối.');
//     }
//   });
// }

async function crawl_brand() {
  try {
    const response = await axios.get('https://cellphones.com.vn/laptop.html');
    const $ = cheerio.load(response.data);
    console.log(response.status);
    const images = [];
    connectMysql();
    $('.brands__content .list-brand__item').each((index, element) => {
      const alt = $(element).find('img').attr('alt');
      const src = $(element).find('img').attr('src');
      connection.query('INSERT INTO brand (name, img_logo) VALUES (?, ?)', [alt, src], function (err, results) {
        if (err) {
          console.error('Error adding data to MySQL database: ' + err.stack);
          return;
        }
        console.log('Data added successfully:', results);
      });
    });
    closeMysql();
  } catch (error) {
    console.error('Error:', error.message);
  }
}
//crawl_brand();

// Path: crawler/crawl.js
let count=0;
async function product_image(laptop_nameAscii, img_list){
  for (const img of img_list) {
    await connection.query('INSERT INTO product_image (url, laptop_nameAscii) VALUES (?, ?)', [`https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/${img.url}`, laptop_nameAscii]);
  }
}
async function crawl(nameAscii) {
  try {
    const url = `https://fptshop.com.vn/api-data/API_GiaDung/api/Product/AppliancesAPI/GetProductDetail?name=${nameAscii}&url=https:%2F%2Ffptshop.com.vn%2Fmay-tinh-xach-tay%2F${nameAscii}&s=`;
    await axios.get(url)
      .then(async response => {

        const data = response.data;
        let description = data.datas.model.product.description ? data.datas.model.product.description : " ";
        let detailDescription = data.datas.model.product.details ? data.datas.model.product.details : " ";
        let discount = 0;
        let name = data.datas.model.product.nameCate;
        let price = data.datas.model.orderModel.priceMarket;
        let stock = 100;
        let img = data.datas.model.product.urlPicture;
        
        if(data.datas.model.product.listAttrDetailShort.length < 10){
          return;
        }
        let display = data.datas.model.product.listAttrDetailShort[0].specName;
        let display2 = display.split(",");
        let screen_size = display2[0].trim();
        let resolution = display2[1].trim();
        let panel_type = display2[2].trim();
        let refresh_rate = display2[3].trim();
        let brightness=null;
        let anti_glare=null;
        if (display2.length == 6) {
          brightness = display2[4].trim();
          anti_glare = display2[5].trim();
        } else {
          anti_glare = display2[4].trim();
        }

        let cpu = data.datas.model.product.listAttrDetailShort[1].specName;
        let cpu2 = cpu.split(",");
        let cpu_brand = null;
        let cpu_model = null;
        let cpu_generation = null;
        if (cpu2.length == 3) {
          cpu_brand = cpu2[0].trim();
          cpu_model = cpu2[1].trim();
          cpu_generation = cpu2[2].trim();
        }else{
          cpu_brand = cpu2[0].trim();
          cpu_model = cpu2[1].trim();
        }

        let ram = data.datas.model.product.listAttrDetailShort[2].specName;
        let ram2 = ram.split(",");
        let ram_capacity=null;
        let ram_type=null;
        if (ram2.length == 2 || ram2.length == 3) {
          ram_capacity = ram2[0].trim();
          ram_type = ram2[1].trim();
        }else{
          ram_capacity = ram2[0].trim();
        }

        let gpu = data.datas.model.product.listAttrDetailShort[3].specName;
        let storage = data.datas.model.product.listAttrDetailShort[4].specName;
        let os = data.datas.model.product.listAttrDetailShort[5].specName;
        let weight_kg = data.datas.model.product.listAttrDetailShort[6].specName;
        let dimensions = data.datas.model.product.listAttrDetailShort[7].specName;
        let origin_country = data.datas.model.product.listAttrDetailShort[8].specName;
        let release_year = data.datas.model.product.listAttrDetailShort[9].specName ? data.datas.model.product.listAttrDetailShort[9].specName : " ";
        let brand = data.datas.model.product.brand.nameAscii;
        let warranty_months = data.datas.model.product.productAttributes[2].specName;

        await connection.query('INSERT INTO laptop (description, detail_description, discount, name, price, stock, display_image, screen_size, resolution, panel_type, refresh_rate, brightness, anti_glare, cpu_brand, cpu_model, cpu_generation, ram_capacity, ram_type, storage, gpu, os, weight_kg, dimensions, origin_country, release_year, brand_nameAscii, warranty_months, laptop_nameAscii) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [description, detailDescription, discount, name, price, stock, img, screen_size, resolution, panel_type, refresh_rate, brightness, anti_glare, cpu_brand, cpu_model, cpu_generation, ram_capacity, ram_type, storage, gpu, os, weight_kg, dimensions, origin_country, release_year, brand, warranty_months, nameAscii]);
        
        let img_list = data.datas.model.product.productVariant.listGallery;
        await product_image(nameAscii, img_list);
        console.log('added successfully');
      })
  } catch (error) {
    console.log(nameAscii);
    console.error('Error:', error.stack, error.message);
    
  }

}
// URL của API
const apiUrl = 'https://fptshop.com.vn/apiFPTShop/Product/GetProductList?brandAscii=&url=https:%2F%2Ffptshop.com.vn%2Fmay-tinh-xach-tay%3Fsort%3Dban-chay-nhat%26trang%3D10%26pagetype%3D1&s=14a0fbc161e479ba59fc5ba949379ad2f8f38f8b6c756e2ce8b6a7aa11fe9ea5';
async function crawler(){
  await axios.get(apiUrl)
    .then(async response => {
      // Xử lý dữ liệu JSON được trả về
      const data = response.data;
      console.log(data);
      let list = data.datas.filterModel.listDefault.list;
      // Trích xuất thông tin từ dữ liệu JSON
      await connectMysql();
      for (const item of list) {
        // In ra tên của mỗi mục
        count++;
        await crawl(item.nameAscii);
        console.log(count + ' Data added successfully');
      } 
    })
    .catch(error => {
      console.error('Đã có lỗi:', error);
    });
}
crawler()