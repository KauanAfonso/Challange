import { Text } from 'react-native';

// Função para títulos
export function Title({ children }: { children: string }) {
  return (
    <Text style={{ fontSize: 40, textAlign: 'center' }}>{children}</Text>
  );
}