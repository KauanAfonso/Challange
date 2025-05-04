import { View } from 'react-native';

//criando um componente de card para ser utilizado em toda a aplicação
export function Card({children}:any){
    return(
        <View style={{backgroundColor:"gray", width:100, height:"20%", borderRadius:10, padding:20, marginTop:10, backgroundColor:'#52796F'}}>
            {children}
        </View>
    )
}