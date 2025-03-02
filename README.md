# ایجاد یک افزونه ووکامرس برای نمایش قیمت محصولات با تبدیل نرخ ارز (API Exchange Rate)

## شرح تسک
یک افزونه وردپرس ایجاد کنید که در صفحات محصول ووکامرس، قیمت محصول را علاوه بر واحد اصلی (دلار) به **یوان چین (CNY)** نمایش دهد. نرخ تبدیل باید از یک API دریافت شود.

---

## نیازمندی‌ها

### ۱. دریافت نرخ ارز از API
- استفاده از API سایت [ExchangeRate-API](https://www.exchangerate-api.com)
- **Your API Key:** `07335b99ef50f6a8120749d1`
- **Example Request:**  
  ```plaintext
  https://v6.exchangerate-api.com/v6/07335b99ef50f6a8120749d1/latest/USD
