package dto

type HistoryUpdateDTO struct {
	ID       uint   `json:"id" form:"id"`
	Sejarah  string `json:"sejarah" binding:"required"`
	Tujuan   string `json:"tujuan" binding:"required"`
	Dibangun string `json:"dibangun" binding:"required"`
	Image    string `json:"image" binding:"required"`
}

type HistoryCreateDTO struct {
	Sejarah  string `json:"sejarah" binding:"required"`
	Tujuan   string `json:"tujuan" binding:"required"`
	Dibangun string `json:"dibangun" binding:"required"`
	Image    string `json:"image" binding:"required"`
}
