package dto

type NewsCreateDTO struct {
	Judul      string `json:"judul" binding:"required"`
	Deskripsi  string `json:"deskripsi" binding:"required"`
	Image      string `json:"image"`
	CategoryID uint   `json:"category_id" binding:"required"`
}

type NewsUpdateDTO struct {
	ID         uint   `json:"id"`
	Judul      string `json:"judul,omitempty"`
	Deskripsi  string `json:"deskripsi,omitempty"`
	Image      string `json:"image,omitempty"`
	CategoryID uint   `json:"category_id,omitempty"`
}
