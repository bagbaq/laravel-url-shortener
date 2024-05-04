# 🔗 A Laravel URL Shortener Platform
My first project using <b>Laravel</b> and <b>Tailwind!</b>


## ✨ Key Features

- Login/Register
- Create short links 4-64 characters long
- Send e-mail to link owner once the link visited
- Track the visit count of a link
- Contact form
- API for listing, creating, updating and destroying links

## API Usage
Authorization: Bearer Token (The token you got from setup below)

### Gain access token for API usage

```http
  GET /api/user/get_token
```

| Parameter  | Type     | Description           |
|:-----------|:---------|:----------------------|
| `username` | `string` | Your username in site |
| `password` | `string` | Your password in site |


### List all short links

```http
  GET /api/user/links
```

### List the short link of given id

```http
  GET /api/user/links/{id}
```

### Create short link

```http
  POST /api/user/links
```

| Parameter    | Type      | Description                      |
|:-------------|:----------|:---------------------------------|
| `main_url`   | `url`     | Desired url                      |
| `length`     | `integer` | Length of short link (4-64 long) |
| `send_email` | `boolean` | Send e-mail once link visited?   |

### Update short link

```http
  PUT /api/user/links/{id}
```

| Parameter    | Type      | Description                       |
|:-------------|:----------|:----------------------------------|
| `main_url`   | `url`     | Optional if **send_email** exists |
| `send_email` | `boolean` | Optional if **main_url** exists   |

### Delete short link

```http
  DELETE /api/user/links/{id}
```

## 📝 Todo List

- Make admin panel for managing links, users and general settings of the site
- Beautify the front-end
- Create QR-Code for short link
- Protect short links with password

## 📸 Screenshots

![Screenshot 1](some screen shot)

