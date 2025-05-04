import React, { useEffect } from 'react';
import { View, Text, ScrollView, Image } from 'react-native';
import { Link, useRouter } from 'expo-router';
import AsyncStorage from '@react-native-async-storage/async-storage';
import Icon from 'react-native-vector-icons/MaterialIcons';  
import { Card } from '../components/Card';


export default function HomeScreen() {
  const router = useRouter(); // Usado para redirecionar

  // Verificação do token no carregamento da tela
  useEffect(() => {
    const verificarLogin = async () => {
      const token = await AsyncStorage.getItem('token');
      if (!token) {
        router.replace('/pages/login'); // Redireciona para a tela de login
      }
    };

    verificarLogin();
  }, []);

  const habitos = [
    { nome: "Luz Solar", icone: "wb-sunny" },
    { nome: "Ar Puro", icone: "air" },
    { nome: "Alimentação Saudável", icone: "fastfood" },
    { nome: "Exercício Físico", icone: "fitness-center" },
    { nome: "Água", icone: "water" },
    { nome: "Descanso", icone: "bed" },
    { nome: "Temperança", icone: "balance" },
    { nome: "Confiança em Deus", icone: "book" }
  ];

  const habitosCard = habitos.map((habito, index) => (
    <Card key={index} style={{ marginRight: 12 }}>
      <Text style={{ color: "white", fontSize: 20 }}>
        <Icon name={habito.icone} size={55} color="#BCD5AC" />
      </Text>
    </Card>
  ));

  return (
    <View style={{ flex: 1 }}>
      <View
        style={{
          width: 300,
          height: 200,
          alignItems: 'center',
          justifyContent: 'center',
          marginLeft: 60,
          backgroundColor: '#f0f0f0',
        }}
      >
        <Image
          source={require('../../assets/images/LIFESTYLE.png')}
          style={{
            width: 250,
            height: 150,
            resizeMode: 'contain',
          }}
        />
      </View>

      <ScrollView horizontal style={{ marginTop: 0 }}>
        <View style={{ flexDirection: 'row', gap: 5, paddingHorizontal: 10 }}>
          {habitosCard}
        </View>
      </ScrollView>

      <View style={{ alignItems: 'center', marginTop: 30 }}>
        <Text style={{ fontSize: 18, fontWeight: 'bold', color: 'white' }}>Home</Text>
        <Link href="/pages/about" style={{ marginTop: 10, color: 'blue' }}>About</Link>
        <Link href="/pages/login" style={{ marginTop: 10, color: 'blue' }}>Login</Link>
      </View>
    </View>
  );
}
