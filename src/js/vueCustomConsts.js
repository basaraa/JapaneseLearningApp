const formStuffs = {
	data(){
		return {
			formInput : [],
			maxChar : []			
		}
	},
	mounted (){
		let x=$('input[type=text]');
		for (i = 0;i< x.length;i++){
			this.formInput[i]='';
			this.maxChar[i]=x[i].maxLength;
		}
	},
	methods: {
		RemainingChars(pos){
			if (this.maxChar[pos])
				return "(ostáva: "+String(this.maxChar[pos]-((this.formInput[pos]).length))+" znakov)";
		}
	}
};
if ($("form")[0] && $('input[type=text]').length>0){
	Vue.createApp(formStuffs).mount('form');
}
