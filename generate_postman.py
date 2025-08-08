import json

# Daftar endpoint berdasarkan route:list dari Laravel
routes = [
    {"name": "Admin", "base": "/api/admin"},
    {"name": "Login Admin", "path": "/api/admin/login", "method": "POST"},
    {"name": "Logout Admin", "path": "/api/admin/logout", "method": "POST"},
    {"name": "Data Anak", "base": "/api/anak"},
    {"name": "Artikel", "base": "/api/artikel"},
    {"name": "Dokumentasi", "base": "/api/dokumentasi"},
    {"name": "Donasi", "base": "/api/donasi"},
    {"name": "Komentar", "base": "/api/komentar"},
    {"name": "Laporan Donasi", "base": "/api/laporan-donasi"},
    {"name": "Pengajuan Anak", "base": "/api/pengajuan-anak"},
    {"name": "Rekap Penyalur", "base": "/api/rekap-penyalur"},
    {"name": "Relawan", "base": "/api/relawan"},
    {"name": "User", "base": "/api/user"}
]

# Buat struktur untuk Postman Collection
collection = {
    "info": {
        "name": "API Dermasapa Santunan",
        "_postman_id": "generated-id",
        "description": "Dokumentasi API untuk backend Laravel - Proyek Dermasapa Santunan",
        "schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json"
    },
    "item": []
}

# Helper untuk tambah CRUD endpoints
def add_crud_items(base_path, name):
    return [
        {
            "name": f"GET {name}",
            "request": {
                "method": "GET",
                "header": [],
                "url": {"raw": f"{{{{base_url}}}}{base_path}", "host": ["{{base_url}}"], "path": base_path.lstrip("/").split("/") }
            }
        },
        {
            "name": f"POST {name}",
            "request": {
                "method": "POST",
                "header": [{"key": "Content-Type", "value": "application/json"}],
                "body": {"mode": "raw", "raw": "{}"},
                "url": {"raw": f"{{{{base_url}}}}{base_path}", "host": ["{{base_url}}"], "path": base_path.lstrip("/").split("/") }
            }
        },
        {
            "name": f"GET {name} by ID",
            "request": {
                "method": "GET",
                "header": [],
                "url": {"raw": f"{{{{base_url}}}}{base_path}/:id", "host": ["{{base_url}}"], "path": base_path.lstrip("/").split("/") + [":id"] }
            }
        },
        {
            "name": f"PUT {name} by ID",
            "request": {
                "method": "PUT",
                "header": [{"key": "Content-Type", "value": "application/json"}],
                "body": {"mode": "raw", "raw": "{}"},
                "url": {"raw": f"{{{{base_url}}}}{base_path}/:id", "host": ["{{base_url}}"], "path": base_path.lstrip("/").split("/") + [":id"] }
            }
        },
        {
            "name": f"DELETE {name} by ID",
            "request": {
                "method": "DELETE",
                "header": [],
                "url": {"raw": f"{{{{base_url}}}}{base_path}/:id", "host": ["{{base_url}}"], "path": base_path.lstrip("/").split("/") + [":id"] }
            }
        }
    ]

# Tambahkan item-item ke collection
for route in routes:
    if "base" in route:
        collection["item"].append({
            "name": route["name"],
            "item": add_crud_items(route["base"], route["name"])
        })
    else:
        # Untuk login/logout (non-CRUD)
        collection["item"].append({
            "name": route["name"],
            "request": {
                "method": route["method"],
                "header": [{"key": "Content-Type", "value": "application/json"}],
                "body": {"mode": "raw", "raw": "{}"},
                "url": {"raw": f"{{{{base_url}}}}{route['path']}", "host": ["{{base_url}}"], "path": route["path"].lstrip("/").split("/") }
            }
        })

# Simpan sebagai file JSON Postman collection
file_path = "/mnt/data/postman_collection_dermasapa.json"
with open(file_path, "w") as f:
    json.dump(collection, f, indent=2)

file_path
