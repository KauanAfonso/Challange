import { View } from 'react-native';

//criando um componente de card para ser utilizado em toda a aplicação
export function Card({children}:any){
    return(
        <View style={{backgroundColor:"gray", width:"auto", height:"10%", borderRadius:10, padding:20, marginTop:10}}>
            {children}
        </View>
    )
}