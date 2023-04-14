class SectionRow{
	constructor(id = uuidv4(), title = "Unknown section", fields = []){
	  this.id = id,
	  this.isTitleEdit = false,
	  this.title = title,
	  this.fields = fields
	}
  }
  
  class FieldRow{
	constructor(){
	  this.id = uuidv4(),
	  this.logoUrl = ""
	  this.stars = 0,
	  this.bonusTxt = "",
	  this.buttonLink = ""
	}
  }
  
  const wpl = new Vue({
	el: '#wpListifyEditor',
	data: {
	  isLoading: true,
	  sections: [],
	},
	methods: {
	  addSection() {
		this.sections.push(new SectionRow());
	  },
	  addField(id) {
		const section = this.sections.find(s => s.id == id);
		section.fields.push(new FieldRow());
	  },
	  editSectionTitle(id){
		const section = this.sections.find(s => s.id == id);
		section.isTitleEdit = !section.isTitleEdit;
	  },
	  toggleSection(index) {
		const sectionDetails =
		  document.querySelectorAll('.section-details')[index];
		sectionDetails.classList.toggle('show');
  
		const collapsibleBtns = document.querySelectorAll('.collapsible-btn');
		collapsibleBtns[index].textContent =
		  collapsibleBtns[index].textContent === '+' ? '-' : '+';
	  },
	  removeSection(id) {
		if(confirm("Are you sure want to delete this section?")){
		  this.sections = this.sections.filter(section => section.id !== id);
		}
	  },
	  removeField(sid, fid){
		if(confirm("Are you sure want to delete this field?")){
		  const section = this.sections.find(s => s.id == sid);
		  section.fields = section.fields.filter(field => field.id !== fid);
		}
	  },
	  uploadLogo(sid, fid){
		var imgfile;
		// If the frame already exists, re-open it.
		if (imgfile) {
		  imgfile.open();
		  return;
		}
		//Extend the wp.media object
		imgfile = wp.media.frames.file_frame = wp.media({
		  title: 'Choose an image',
		  button: {
			text: 'Upload'
		  },
		  multiple: false
		});
	
		//When a file is selected, grab the URL and set it as the text field's value
		imgfile.on('select', function () {
		  const file = imgfile.state().get('selection').first().toJSON();
		  
		  const section = this.sections.find(s => s.id == sid);
		  const field = section.fields.find(f => f.id == fid);
		  field.logoUrl = file.url;
  
		}.bind(this));
	
		//Open the uploader dialog
		imgfile.open();
	  },
	  saveData(){
		jQuery.ajax({
		  type: "post",
		  url: wplObj.ajaxurl,
		  data: {
			action: 'update_editor_data',
			sections: wpl.sections
		  },
		  beforeSend: ()=>{
			wpl.isLoading = true;
		  },
		  dataType: "json",
		  success: function (response) {
			wpl.isLoading = false;
		  }
		});
	  }
	},
	mounted(){
	  jQuery.ajax({
		type: "get",
		url: wplObj.ajaxurl,
		data: {
		  action: "get_editor_data"
		},
		dataType: "json",
		success: function (response) {
		   if(response.success){
			const results = response.success;
			results.forEach(section => {
			  wpl.sections.push(new SectionRow(section.id, section.title, section.fields));
			});
			wpl.isLoading = false;
			wpl.$refs.editor.style.display = "block";
		  }
		}
	  });
	}
  });
  