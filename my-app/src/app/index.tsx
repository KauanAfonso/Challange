import { View, Text, ScrollView } from 'react-native';
import { Link } from 'expo-router';
import { Card } from '@/components/Card';
import { Title } from '@/components/Title';

export default function HomeScreen() {
  const habitos = [
    { nome: "Luz Solar" },
    { nome: "Ar Puro" },
    { nome: "Alimentação Saudável" },
    { nome: "Exercício Físico" },
    { nome: "Água" },
    { nome: "Descanso" },
    { nome: "Temperança" },
    { nome: "Confiança em Deus" }
  ];

  const habitosCard = habitos.map((habito, index) => (
    <Card key={index} style={{ marginRight: 12 }}>
      <Text style={{ color: "white", fontSize: 20 }}>{habito.nome}</Text>
    </Card>
  ));

  return (
    <View style={{ backgroundColor: '#84A98C', flex: 1 }}>
      <Title children={'Seja bem vindo'}/>
      <ScrollView horizontal style={{ marginTop: 50 }}>
        <View style={{ flexDirection: 'row', gap:5, paddingHorizontal: 10 }}>
          {habitosCard}
        </View>
      </ScrollView>

      <View style={{ alignItems: 'center', marginTop: 30 }}>
        <Text style={{ fontSize: 18, fontWeight: 'bold', color: 'white' }}>Home</Text>
        <Link href="/pages/about" style={{ marginTop: 10, color: 'blue' }}>About</Link>
      </View>
    </View>
  );
}
