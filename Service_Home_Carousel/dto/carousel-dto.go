package dto

type CarouselUpdateDTO struct {
	ID    uint   `json:"id" form:"id"`
	Title string `json:"title" form:"title" binding:"required,min=3,max=255"`
	Subtitle string `json:"subtitle" form:"subtitle" binding:"required,min=3,max=255"`
	Image string `json:"image" form:"image" binding:"omitempty"`
}

type CarouselCreateDTO struct {
	Title    string `json:"title" form:"title" binding:"required,min=3,max=255"`
	Image    string `json:"image" form:"image" binding:"omitempty"`
	Subtitle string `json:"subtitle" form:"subtitle" binding:"required,min=3,max=255"`
}
