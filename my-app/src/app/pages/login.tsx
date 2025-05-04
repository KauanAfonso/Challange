import React, { useState } from "react";
import {
  View,
  Text,
  TextInput,
  Button,
  Image,
  StyleSheet,
  Dimensions,
} from "react-native";
import { useNavigation } from "@react-navigation/native";
import AsyncStorage from "@react-native-async-storage/async-storage";
import axios from "axios";
import { Link, useRouter } from 'expo-router';
import { useAuth } from "../auth/AuthContext"; // ajuste para o caminho do seu contexto
import { Input } from '../../components/input';

export default function LoginScreen() {
  const [email, setEmail] = useState(""); // estado para o email
  const [password, setPassword] = useState(""); // estado para a senha
  const [error, setError] = useState(""); // estado para erros

  const navigation = useNavigation();
  const { setIsLoggedIn } = useAuth(); // vem do seu contexto

  // Função chamada ao clicar no botão de login
  const lidarLogin = async () => {
    try {
      const response = await axios.post("http://192.168.56.1:8000/api/login", {
        email: String,
        password: String,
      });

      const { token } = response.data;

      // Armazena o token no AsyncStorage
      await AsyncStorage.setItem("token", token);

      // Atualiza o estado global de login
      setIsLoggedIn(true);

      // Navega para a tela principal e remove o login da pilha
      navigation.reset({
        index: 0,
        routes: [{ name: "index" }], // substitua por sua tela inicial
      });

    } catch (error) {
      console.error("Erro ao fazer login:", error.response?.data || error.message);
      setError("Email ou senha inválidos");
    }
  };


  return (
    <View>
      <View style={styles.logo}>
        <Image source={require('../../../assets/images/logo.png')} />
      </View>

      <View style={styles.container}>
        <View style={styles.content}>
          <Text style={styles.title}>Login</Text>

        <Input
            placeholder="Email"
            value={email}
            onChangeText={setEmail}
          />

          <Input
            placeholder="Senha"
            value={password}
            onChangeText={setPassword}
            secureTextEntry
          />

          {error ? <Text style={styles.error}>{error}</Text> : null}

          <View style={styles.button}>
            <Button title="Entrar" onPress={lidarLogin} color="#52796F" />
          </View>

          <Text>ou</Text>
          <Link href="/pages/criar_conta" style={{ marginTop: 10, color: 'white' }}>Criar Conta</Link>
        </View>
      </View>
    </View>
  );
}

const screenHeight = Dimensions.get('window').height;

const styles = StyleSheet.create({
  logo: {
    alignItems: 'center',
    margin: 40,
  },
  title: {
    fontSize: 30,
    fontWeight: 'bold',
    color: '#FFFF',
    marginBottom: 20,
  },
  container: {
    alignItems: 'center',
    borderTopLeftRadius: 70,
    backgroundColor: "#52796F",
    marginTop: 50,
    padding: 50,
    height: screenHeight,
  },
  content: {
    alignItems: 'center',
    justifyContent: 'center',
    borderTopLeftRadius: 70,
    marginTop: 50,
  },
  input: {
    height: 40,
    borderRadius: 6,
    width: 300,
    backgroundColor: '#B1DBBA',
    borderColor: '#ccc',
    borderWidth: 1,
    marginBottom: 20,
    paddingLeft: 10,
  },
  button: {
    width: '100%',
    marginVertical: 10,
  },
  error: {
    color: 'red',
    marginBottom: 10,
  },
});
